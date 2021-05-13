<?php

namespace StaticFactory;

use Factory\FileDBConnection;
use Factory\MySQLDBConnection;

class DBFactory
{
    public static function make($type)
    {
        var_dump(key($type));
//        switch (key($type)) {
//            case "mysql":
//                return new MySQLDBConnection($type['mysql']);
//            case "file":
//                return new FileDBConnection($type['file']);
//        }

//        throw new \Exception('err');
    }
}