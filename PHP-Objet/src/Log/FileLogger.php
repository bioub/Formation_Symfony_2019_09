<?php

namespace Cfd\Log;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class FileLogger implements LoggerInterface
{
    use LoggerTrait;

    protected $fic;

    public function __construct(string $filePath)
    {
        $this->fic = fopen($filePath, 'a');
    }


    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        $line = "[$level] $message\n"; // [debug] Début du rendu
        fwrite($this->fic, $line);
    }
}