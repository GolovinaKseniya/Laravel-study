<?php

require_once '../vendor/autoload.php';

$config = [
    'db' => 'mysql:host=localhost;dbname=test',
    'user' => 'root',
    'pass' => '123456'
];

$db = new MySQLDBBuilder\MySQLDBDriver($config);

$queryBuilder = new MySQLDBBuilder\MySQLDBBuilder($db, 'test');


var_dump(
    $queryBuilder
    ->where('city', '=', 'Ukraine')
    ->where('id', '=', 4)
//    ->orWhere('city', '=', 'Italy')
//    ->orWhere('city', '=', 'Japan')
    ->select()
    ->get()
);

//var_dump($queryBuilder->insert(['id' => 5, 'city' => 'Ukraine']));
//var_dump($queryBuilder
//    ->where('id', '=', 'FileDBBuilder')
//    ->orWhere('id', '=', 'MySQLDBBuilder')
//    ->delete());

//var_dump(
//    $queryBuilder
//        ->select(['id', 'city'])
//        ->where('id', '=', '1')
//        ->orWhere('id', '=', 'MySQLDBBuilder')
//        ->orWhere('id', '=', 'FileDBBuilder')
//        ->get());

//var_dump(
//    $queryBuilder
//    ->where('id', '=', '33')
//    ->update(['city' => 'TEST222222'])
//);
