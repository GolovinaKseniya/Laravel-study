<?php

use MySQLDBBuilder\MySQLDBDriver;
use MySQLDBFactory\MySQLDBConnection;

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

$fd = new MySQLDBDriver($config);

$mysqlDbFactory = new MySQLDBConnection($fd);
var_dump($mysqlDbBuilder = $mysqlDbFactory->table('test'));

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
//    ->find([['id', '=',  1], ['id', '=', 3]]);
//    ->read(['id', 'name']);

//echo ((1 && 1 && 1) || 0 || 0) ? 'true' : 'false';

