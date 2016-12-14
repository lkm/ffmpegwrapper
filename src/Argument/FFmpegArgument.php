<?php


namespace FFmpegWrapper\Argument;


class FFmpegArgument
{
    const AUDIO_BITRATE = 'b:a';
    const AUDIO_CODEC = 'c:a';
    const AUDIO_QUALITY = 'q:a';
    const AUDIO_CHANNELS = 'ac';
    const AUDIO_VBR_GROUP = 'vbr';
    const AUDIO_SAMPLING_FREQUENCY = 'ar';

    const VIDEO_BIRATE = 'b:v';
    const VIDEO_CODEC = 'c:v';
    const VIDEO_QUALITY = 'q:v';

    const INPUT = 'i';
    const FRAMERATE = 'r';

    /**
     * @param string $argument
     * @return bool
     */
    public static function isValid($argument)
    {
        return in_array($argument, self::getAll());
    }

    /**
     * @return string[]
     */
    public static function getAll()
    {
        return [
            self::AUDIO_BITRATE,
            self::AUDIO_CODEC,
            self::AUDIO_QUALITY,
            self::AUDIO_CHANNELS,
            self::AUDIO_VBR_GROUP,
            self::AUDIO_SAMPLING_FREQUENCY,
            self::VIDEO_BIRATE,
            self::VIDEO_QUALITY,
            self::VIDEO_QUALITY,

            self::INPUT,
            self::FRAMERATE
        ];
    }
}