<?php

include_once "Cache.php";

//filesystem
//$filesystem = Cache::storage('file', ['path' => 'test']);
//$filesystem->set('testg.txt', 'hlfgghghh');

$database = Cache::storage('database', [
    'database' => 'test',
    'host' => 'localhost',
    'port' => 3306,
    'user' => 'root',
    'password' => '123456'
])->get('test');

var_dump($database);

CacheDriver::load('./config/cache.php');

Cache::storage('file');

