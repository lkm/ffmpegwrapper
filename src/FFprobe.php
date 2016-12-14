<?php

namespace FFmpegWrapper;

use FFmpegWrapper\Analyze\Media;
use FFmpegWrapper\Exception\CannotAccessFile;
use FFmpegWrapper\Exception\UnsupportedMediaFormat;

class FFprobe extends Executable
{
    /**
     * @param $fileName
     * @return Media
     * @throws CannotAccessFile
     * @throws UnsupportedMediaFormat
     */
    public function analyze($fileName)
    {
        if (false == file_exists($fileName) && false == is_file($fileName)) {
            throw new CannotAccessFile($fileName . ' does not exist');
        }

        $mediaArray = $this->parseOutput($this->execute($fileName));

        if (false == isset($mediaArray['format'])) {
            throw new UnsupportedMediaFormat('FFProbe could not parse the file');
        }

        return new Media($mediaArray);
    }

    /**
     * @param string $output
     * @return array
     */
    protected function parseOutput($output)
    {
        return json_decode($output, true);
    }

    protected function getCommand()
    {
        return 'ffprobe';
    }

    protected function getDefaultArguments()
    {
        return '-v quiet -print_format json -show_format -show_streams';
    }
}