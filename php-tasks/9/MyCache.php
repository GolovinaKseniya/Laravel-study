<?php

include_once "DriverFile.php";
include_once "DriverMemory.php";
include_once "DriverDB.php";

$file = 'file.txt';
$current = 'fjgjgghbggg';

$key = 'Italy';

MyCache::storage('file')->set($file, $current);
//MyCache::storage('file');
//var_dump(MyCache::storage('file')->set($file, $current));

//var_dump(MyCache::storage('db')->get('hashjhhh'));


class MyCache
{
    protected $driver;

    /**
     * @param $driver
     * @return DriverDB|DriverFile
     */
    public static function storage($driver)
    {
        switch ($driver) {
            case "memory":
                var_dump('memory');
                break;
            case "file":
                return new DriverFile();
            case "db":
                return DriverDB::make('localhost', 'root', '123456', 'test');
            default:
        }
    }

}