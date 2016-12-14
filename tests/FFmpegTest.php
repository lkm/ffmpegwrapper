<?php

namespace FFmpegWrapper;


use FFmpegWrapper\Argument\AudioCodec;

class FFmpegTest extends \PHPUnit_Framework_TestCase
{
    public function testEncodeFile1()
    {
        $outputFile = __DIR__ . '/test_out.mp3';
        $ffmpeg = new FFmpeg();
        $ffmpeg->setInput(__DIR__ . '/test_encode1.wav')
            ->setOutput($outputFile)
            ->setAudioCodec(AudioCodec::MP3)
            ->setAudioVBRGroup(3)
            ->run();

        $ffprobe = new FFprobe();
        $media = $ffprobe->analyze($outputFile);
        unlink($outputFile);

        $this->assertEquals('mp3', $media->getFormatName());
    }
}
