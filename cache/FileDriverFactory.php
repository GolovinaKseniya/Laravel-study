<?php


class FileDriverFactory implements DriverFactory
{
    public string $type = 'file';
    protected static array $drivers = [];

    public function createDriver($config): FileCacheDriver
    {
        return new FileCacheDriver($config);
    }
}