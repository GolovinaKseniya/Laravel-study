<?php

namespace Facade;

use FileDB\DBBuilderInterface;
use MySQLDBBuilder\MySQLDBBuilder;
use StaticFactory\DBFactory;

class DB
{
    public function table()
    {

    }

    public static function config($type)
    {
        $config = include "../config/config.php";
        return $config[$type];
    }

    public static function connection($type = 'mysql')
    {
        return DBFactory::make(self::config($type));
    }
}