<?php
include_once "FileDBDriver.php";

$exampleArray = [
    ['id' => 'test', 'title' => '1234', 'name' => 12344],
    ['id' => 'ffff', 'title' => 'ggg', 'name' => 5888, 'age' => '22', 'city' => 'London']
];

$config = [
    'extension' => '.txt',
    'path' => 'storage'
];

$fd = new FileDBDriver($config);

//$db->file('users')
//    ->find([['name', '=', 'test']])
//    ->update(['name' => 'new_test'])

$fd->file('test')
    ->find([['name', '=', 'fdff']])
    ->update(['name' => 'TTTTTT']);


//$fd
//    ->file('test')
//    ->append(['id' => '2', 'name' => 'fdff']);

//$fd->file('test')
//    ->find([['id', '=',  1], ['id', '=', 3]]);
//    ->read(['id', 'name']);