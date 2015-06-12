<?php
namespace Wandu\Standard\IO;

interface Executable
{
    /**
     * @param string $command
     * @return string
     */
    public function execute($command);

    /**
     * @param $command
     * @param Writable $writer
     * @return int
     */
    public function executeWithWriter($command, Writable $writer);
}
