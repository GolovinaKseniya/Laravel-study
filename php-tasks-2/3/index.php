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
    ->find(
        [['name', '=', 'mmmmm'], ['id', '<', 20]],
        [['id', '=', 3], ['id', '=', 2]]
    )
    ->update(['name' => 'TTTTTT'])
//    ->read(['id', 'name'])
;
//    ->update(['name' => 'TTTTTT']);


//$fd->file('test')
//    ->find([['id', '=',  1], ['id', '=', 3]]);
//    ->read(['id', 'name']);

//echo ((1 && 1 && 1) || 0 || 0) ? 'true' : 'false';

