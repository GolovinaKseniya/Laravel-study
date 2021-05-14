<?php

namespace StaticFactory;

use Factory\FileDBConnection;
use Factory\MySQLDBConnection;

class DBFactory
{
    public static function make($type)
    {
        $config = include "../config/config.php";

        if (in_array($type, $config)) {
            $key = array_search($type, $config);

            switch ($key) {
                case "mysql":
                    return new MySQLDBConnection($type);
                case "file":
                    return new FileDBConnection($type);
            }
        }
    }
}