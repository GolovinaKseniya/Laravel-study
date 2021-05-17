<?php


namespace Factory;
use FileDB\FileDBBuilder;
use FileDB\FileDBDriver;

class FileDBConnection implements DBFactoryInterface
{
    /**
     * @var FileDBDriver
     */
    public FileDBDriver $config;

    /**
     * FileDBConnection constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new FileDBDriver($config);
    }

    /**
     * @param string $table
     * @return FileDBBuilder
     */
    public function table(string $table): FileDBBuilder
    {
        return new FileDBBuilder($this->config, $table);
    }
}