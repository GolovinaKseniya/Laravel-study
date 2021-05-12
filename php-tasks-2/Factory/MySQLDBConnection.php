<?php


namespace Factory;

use MySQLDBBuilder\MySQLDBBuilder;
use MySQLDBBuilder\MySQLDBDriver;

class MySQLDBConnection
{
    public MySQLDBDriver $config;

    public function __construct(array $config)
    {
        $this->config = new MySQLDBDriver($config);
    }

    public function table(string $table): MySQLDBBuilder
    {
        return new MySQLDBBuilder($this->config, $table);
    }
}