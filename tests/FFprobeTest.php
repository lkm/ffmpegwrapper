<?php

namespace FFmpegWrapper;


class FFprobeTest extends \PHPUnit_Framework_TestCase
{
    public function testAnalyseTestFile1()
    {
        $ffprobe = new FFprobe();

        $media = $ffprobe->analyze(__DIR__ . '/test_probe.m4a');

        $this->assertEquals('aac', $media->getStreams()[0]->getCodecName());
        $this->assertEquals(67406, $media->getBitRate());
    }
}
