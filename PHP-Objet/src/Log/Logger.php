<?php

namespace Cfd\Log;

use Cfd\Writer\WriterInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

final class Logger implements LoggerInterface
{
    use LoggerTrait;

    /** @var WriterInterface */
    protected $writer;

    /**
     * Logger constructor.
     * @param WriterInterface $writer
     */
    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
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
        $this->writer->write($line);
    }
}