<?php
namespace FFmpegWrapper\Analyze;


class Stream
{
    protected $_stream;

    public function __construct(array $stream)
    {
        $this->_stream = $stream;
    }

    /**
     * Get the short name of the codec for the stream
     *
     * @return string
     */
    public function getCodecName()
    {
        return $this->_stream['codec_name'];
    }

    /**
     * Get the long name of the codec for the stream
     *
     * @return string
     */
    public function getCodecLongName()
    {
        return $this->_stream['codec_long_name'];
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->_stream['profile'];
    }

    /**
     * Get stream codec type, e.g. audio, video
     *
     * @return string
     */
    public function getCodecType()
    {
        return $this->_stream['codec_type'];
    }

    /**
     * Number of channels in stream
     *
     * @return int
     */
    public function getChannels()
    {
        return $this->_stream['channels'];
    }

    /**
     * Channel layout, e.g. mono, stereo
     *
     * @return string
     */
    public function getChannelLayout()
    {
        return $this->_stream['channel_layout'];
    }

    /**
     * Get bitrate in bits
     *
     * @return int
     */
    public function getBitRate()
    {
        return $this->_stream['bit_rate'];
    }

    /**
     * Get duration in secs
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->_stream['duration'];
    }

    /**
     * Get sample rate
     *
     * @return int
     */
    public function getSampleRate()
    {
        return $this->_stream['sample_rate'];
    }

    /**
     * Get number of frames in stream
     *
     * @return int
     */
    public function getNumberOfFrames()
    {
        return $this->_stream['nb_frames'];
    }

    /**
     * Get maximum bitrate
     *
     * @return int
     */
    public function getMaxBitRate()
    {
        return $this->_stream['max_bit_rate'];
    }

    /**
     * Get stream index in container
     *
     * @return int
     */
    public function getIndex()
    {
        return $this->_stream['index'];
    }

    /**
     * @return float
     */
    public function getStartTime()
    {
        return $this->_stream['start_time'];
    }
}