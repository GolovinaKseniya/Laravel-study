<?php

use MySQLDBBuilder\MySQLDBDriver;
use Factory\MySQLDBConnection;

require_once '../vendor/autoload.php';


$exampleArray = [
    ['id' => 'test', 'title' => '1234', 'name' => 12344],
    ['id' => 'ffff', 'title' => 'ggg', 'name' => 5888, 'age' => '22', 'city' => 'London']
];

//$config = [
//    'extension' => '.txt',
//    'path' => 'storage'
//];

$config = [
    'db' => 'mysql:host=localhost;dbname=test',
    'user' => 'root',
    'pass' => '123456'
];

//$fd = new \FileDB\FileDBDriver($config);
//
//$fdBuilder = new \FileDB\FileDBBuilder($fd, 'test');
//
//$fd
//    ->file('test')
//    ->find(
//    [['id', '=', 1], ['title', '=', 'title111'], ['name', '=', 'test']],
//    [['title', '=', 'title555'], ['title', '=', 'title333']]
//    )
//    ->delete()
//;

$fd = new MySQLDBDriver($config);
$fdBuilder = new \MySQLDBBuilder\MySQLDBBuilder()


//$mysqlDbFactory = new MySQLDBConnection($fd);
//var_dump($mysqlDbBuilder = $mysqlDbFactory->table('test'));

//$fd = new FileDB\FileDBDriver($config);
//$queryBuilder = new FileDB\FileDBBuilder($fd);
//$queryBuilder
//    ->where('id', '=', 1)
//    ->orWhere('id', '=', 5)
//    ->update(['name' => 'new_test'])
//    ->delete()
;

//$fd->file('test2')
//    ->find([['id', '=',  1]])
//    ->update(['name' => 'new_test'])
//;


//$db->file('users')
//    ->find([['name', '=', 'test']])
//    ->update(['name' => 'new_test'])


//$fd->file('test')
//    ->find([['id', '=',  1], ['id', '=', FileDBBuilder]]);
//    ->read(['id', 'name']);

//echo ((1 && 1 && 1) || 0 || 0) ? 'true' : 'false';

