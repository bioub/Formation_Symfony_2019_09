<?php


namespace Cfd\Writer;


class FileWriter implements WriterInterface
{
    public function __construct(string $filePath)
    {
        $this->fic = fopen($filePath, 'a');
    }

    public function __destruct()
    {
        fclose($this->fic);
    }

    public function write($message)
    {
        fwrite($this->fic, $message);
    }
}