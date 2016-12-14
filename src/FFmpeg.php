<?php

namespace FFmpegWrapper;


use FFmpegWrapper\Argument\FFmpegArgument;
use FFmpegWrapper\Exception\CannotAccessFile;
use InvalidArgumentException;

class FFmpeg extends Executable
{
    use VideoTrait, AudioTrait;

    protected $arguments = [];
    protected $outputFile;

    /**
     * @param $filePath
     * @return FFmpeg
     * @throws CannotAccessFile
     */
    public function setInput($filePath)
    {
        if (false == file_exists($filePath) && false == is_file($filePath)) {
            throw new CannotAccessFile($filePath . ' does not exist');
        }

        return $this->addArgument(FFmpegArgument::INPUT, $filePath);
    }

    public function setOutput($filePath)
    {
        if (false == is_writable(dirname($filePath)) ){
            throw new CannotAccessFile($filePath . ' is not writable');
        }

        $this->outputFile = $filePath;

        return $this;
    }

    protected function buildArgumentString()
    {
        $argumentString = "";

        foreach ($this->arguments as $key => $value) {
            $argumentString .= "-$key $value ";
        }

        return $argumentString . ' ' . $this->outputFile;
    }

    public function run()
    {
        if (false == isset($this->arguments[FFmpegArgument::INPUT])) {
            throw new InvalidArgumentException("Missing input file argument, use setInput()");
        }

        if (null == $this->outputFile) {
            throw new InvalidArgumentException("Missing out file argument, use setOutput()");
        }

        $this->execute($this->buildArgumentString());
    }

    /**
     * Add commandline argument
     *
     * @param $key
     * @param $value
     * @return FFmpeg
     */
    protected function addArgument($key, $value)
    {
        $this->arguments[$key] = $value;

        return $this;
    }


    /**
     * Command name to execute
     *
     * @return string
     */
    protected function getCommand()
    {
        return 'ffmpeg';
    }

    /**
     * Arguments to always add
     *
     * @return string
     */
    protected function getDefaultArguments()
    {
        return '';
    }
}