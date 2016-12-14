<?php

namespace FFmpegWrapper\Analyze;

use InvalidArgumentException;

class Media
{
    protected $_format;
    protected $_streams;

    public function __construct(array $info)
    {
        if (!isset($info['format'])) {
            throw new InvalidArgumentException("Incorrently formatted information");
        }

        $this->_format = $info['format'];
        $this->_streams = isset($info['streams']) ? $info['streams'] : [];
    }

    /**
     * Get duration in secs
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->_format['duration'];
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->_format['filename'];
    }

    /**
     * @return string
     */
    public function getFormatName()
    {
        return $this->_format['format_name'];
    }

    /**
     * @return string
     */
    public function getFormatLongName()
    {
        return $this->_format['format_long_name'];
    }

    /**
     * Get file size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->_format['size'];
    }

    /**
     * Get average bitrate
     *
     * @return int
     */
    public function getBitRate()
    {
        return $this->_format['bit_rate'];
    }

    /**
     * Number of seperate streams in file
     *
     * @return int
     */
    public function getNumberOfStreams()
    {
        return $this->_format['nb_streams'];
    }

    /**
     * @return Stream[]
     */
    public function getStreams()
    {
        if (count($this->_streams) > 0) {
            return array_map(function($streamArray){
                return new Stream($streamArray);
            }, $this->_streams);
        }

        return [];
    }
}