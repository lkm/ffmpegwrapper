<?php

namespace FFmpegWrapper;

use FFmpegWrapper\Argument\FFmpegArgument;

trait VideoTrait
{
    abstract protected function addArgument($key, $value);

    /**
     * @param $codec
     * @return FFmpeg
     */
    public function setVideoCodec($codec)
    {
        return $this->addArgument(FFmpegArgument::VIDEO_CODEC, $codec);
    }

    /**
     * @param $bitrate
     * @return FFmpeg
     */
    public function setVideoBitrate($bitrate)
    {
        return $this->addArgument(FFmpegArgument::VIDEO_BIRATE, $bitrate);
    }

    /**
     * @param $quality
     * @return FFmpeg
     */
    public function setVideoQuality($quality)
    {
        return $this->addArgument(FFmpegArgument::VIDEO_QUALITY, $quality);
    }
}