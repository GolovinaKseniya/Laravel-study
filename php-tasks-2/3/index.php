<?php
include_once "FileDBDriver.php";

$exampleArray = [
    [1 => 'test', 'test' => '1234', 'trrt' => 12344],
    ['trr' => 'ffff', 'test' => 'ggg', [1 => 'gdfg', 'test' => 555], 'ghd23' => '1234', 'ffff' => 12344]
];

$config = [
    'extension' => '.txt',
    'path' => 'storage'
];

$fd = new FileDBDriver($config);

//var_dump($fd->file('test'));

$fd->get('test');
