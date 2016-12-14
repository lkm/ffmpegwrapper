<?php

namespace FFmpegWrapper\Analyze;

class MediaTest extends \PHPUnit_Framework_TestCase
{
    public function testLoadSample()
    {
        $mediaArray = json_decode(file_get_contents(__DIR__ . '/sample_output.json'), true);
        $media = new Media($mediaArray);

        $this->assertInstanceOf(Media::class, $media);
    }

    public function testGetFileName()
    {
        $mediaArray = json_decode(file_get_contents(__DIR__ . '/sample_output.json'), true);
        $media = new Media($mediaArray);

        $this->assertEquals("sample-file.m4a", $media->getFileName());
    }
}
