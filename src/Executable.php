<?php

namespace FFmpegWrapper;

use Symfony\Component\Process\Process;

abstract class Executable
{
    /**
     * Execute command
     *
     * @param $arguments
     * @return string
     */
    protected function execute($arguments)
    {
        $process = new Process($this->getCommand() . ' ' . $this->getDefaultArguments() . ' ' . $arguments);
        $process->run();

        return $process->getOutput();
    }

    /**
     * Command name to execute
     *
     * @return string
     */
    abstract protected function getCommand();

    /**
     * Arguments to always add
     *
     * @return string
     */
    abstract protected function getDefaultArguments();
}