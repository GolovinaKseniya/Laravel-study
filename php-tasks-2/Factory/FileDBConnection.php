<?php


namespace Factory;


use FileDB\FileDBBuilder;
use FileDB\FileDBDriver;

class FileDBConnection
{
    public FileDBDriver $config;

    public function __construct(array $config)
    {
        $this->config = new FileDBDriver($config);
    }

    public function table(string $table): FileDBBuilder
    {
        return new FileDBBuilder($this->config, $table);
    }
}