<?php

namespace FFmpegWrapper;

use FFmpegWrapper\Argument\FFmpegArgument;

trait AudioTrait
{
    abstract protected function addArgument($key, $value);

    /**
     * @param $codec
     * @return FFmpeg
     */
    public function setAudioCodec($codec)
    {
        return $this->addArgument(FFmpegArgument::AUDIO_CODEC, $codec);
    }

    /**
     * @param $bitrate
     * @return FFmpeg
     */
    public function setAudioBitrate($bitrate)
    {
        return $this->addArgument(FFmpegArgument::AUDIO_BITRATE, $bitrate);
    }

    /**
     * @param $quality
     * @return FFmpeg
     */
    public function setAudioQuality($quality)
    {
        return $this->addArgument(FFmpegArgument::AUDIO_QUALITY, $quality);
    }

    /**
     * @param $group
     * @return FFmpeg
     */
    public function setAudioVBRGroup($group)
    {
        return $this->addArgument(FFmpegArgument::AUDIO_VBR_GROUP, $group);
    }

    /**
     * @param $number
     * @return FFmpeg
     */
    public function setAudioChannels($number)
    {
        return $this->addArgument(FFmpegArgument::AUDIO_CHANNELS, $number);
    }

    /**
     * @param $frequency
     * @return FFmpeg
     */
    public function setAudioSamplingFrequency($frequency)
    {
        return $this->addArgument(FFmpegArgument::AUDIO_SAMPLING_FREQUENCY, $frequency);
    }
}