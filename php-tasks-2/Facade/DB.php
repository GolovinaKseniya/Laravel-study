<?php

namespace Facade;

use FileDB\DBBuilderInterface;
use StaticFactory\DBFactory;

class DB
{
    public static array $config;
    public string $table;

    public function config()
    {
        $this->config = include_once "../config/config.php";
    }

    public static function connection(string $type)
    {
        $config = include_once "../config/config.php";

        return DBFactory::make($type);
    }

    public function table($table)
    {
        $this->table = $table;
//        return DBBuilderInterface::class;
    }
}