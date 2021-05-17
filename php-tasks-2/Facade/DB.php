<?php

namespace Facade;

use Factory\DBFactoryInterface;
use StaticFactory\DBFactory;

class DB
{
    public static $connection;

    public static function table(string $table)
    {
        if(!isset(self::$connection)) {
            $config = include_once "../config/config.php";
            $default = $config['default'];
            self::$connection = DBFactory::make($config['connections'][$default]);
            return self::$connection->table($table);
        } else {
            return self::$connection->table($table);
        }
    }

    public static function connection($type)
    {
        $config = include_once "../config/config.php";
        self::$connection = DBFactory::make($config['connections'][$type]);
        return self::$connection;
    }
}