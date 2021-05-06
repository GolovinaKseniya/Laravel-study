<?php
include_once "FileDBDriver.php";
include_once "FileDBBuilder.php";

$exampleArray = [
    ['id' => 'test', 'title' => '1234', 'name' => 12344],
    ['id' => 'ffff', 'title' => 'ggg', 'name' => 5888, 'age' => '22', 'city' => 'London']
];

$config = [
    'extension' => '.txt',
    'path' => 'storage'
];

$fd = new FileDBDriver($config);
//$queryBuilder = new FileDBBuilder($fd);
//$queryBuilder
//    ->where(1, '=', 1)
//    ->where(1, '=', 1)
//    ->orWhere('id', '=', 5)
//    ->orWhere('test', '=', 5)
//    ->select(['id', 'name'])
//    ->get();

//$db->file('users')
//    ->find([['name', '=', 'test']])
//    ->update(['name' => 'new_test'])

$fd->file('test')
    ->find(
        [['name', '=', 'rrrrr']], [['id', '=', 5]]
    )
    ->update(['name' => 'test123'])
    ->read(['id', 'name'])
;
//    ->update(['name' => 'TTTTTT']);


//$fd->file('test')
//    ->find([['id', '=',  1], ['id', '=', 3]]);
//    ->read(['id', 'name']);

//echo ((1 && 1 && 1) || 0 || 0) ? 'true' : 'false';

