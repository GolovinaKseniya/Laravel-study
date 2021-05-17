<?php

namespace Factory;

use FileDB\DBBuilderInterface;

interface DBFactoryInterface
{
    /**
     * DBFactoryInterface constructor.
     * @param array $config
     */
    public function __construct(array $config);

    /**
     * @param string $table
     * @return DBBuilderInterface
     */
    public function table(string $table): DBBuilderInterface;
}