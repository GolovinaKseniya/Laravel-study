<?php


namespace Factory;

use FileDB\DBBuilderInterface;
use MySQLDBBuilder\MySQLDBBuilder;
use MySQLDBBuilder\MySQLDBDriver;

class MySQLDBConnection implements DBFactoryInterface
{
    /**
     * @var MySQLDBDriver
     */
    public MySQLDBDriver $config;

    /**
     * MySQLDBConnection constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = new MySQLDBDriver($config);
    }

    /**
     * @param string $table
     * @return DBBuilderInterface
     */
    public function table(string $table): DBBuilderInterface
    {
        return new MySQLDBBuilder($this->config, $table);
    }
}