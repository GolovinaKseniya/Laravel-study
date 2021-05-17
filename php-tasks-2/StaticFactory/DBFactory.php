<?php

namespace StaticFactory;

use Factory\FileDBConnection;
use Factory\MySQLDBConnection;

class DBFactory
{
    /**
     * @param $type
     * @return FileDBConnection|MySQLDBConnection
     */
    public static function make($type)
    {
        switch ($type['driver']) {
            case "mysql":
                return new MySQLDBConnection($type);
            case "file":
                return new FileDBConnection($type);
        }
    }
}