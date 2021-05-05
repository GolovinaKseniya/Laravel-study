<?php

include_once "MySQLDBDriver.php";
include_once "MySQLDBBuilder.php";

$config = [
    'db' => 'mysql:host=localhost;dbname=test',
    'user' => 'root5',
    'pass' => '123456'
];

$db = new MySQLDBDriver($config);

$queryBuilder = new MySQLDBBuilder($db, 'test');


//var_dump($queryBuilder->select());
//var_dump($queryBuilder->where('name', '=', 'test'));
//var_dump(
//    $queryBuilder
//    ->where('city', '=', 'Japan')
//    ->orWhere('city', '=', 'Italy')
//    ->select()
//    ->get()
//);

var_dump($queryBuilder->insert(['id' => 5, 'city' => 'Ukraine']));
//var_dump($queryBuilder
//    ->where('id', '=', '3')
//    ->orWhere('id', '=', '2')
//    ->delete());

//var_dump(
//    $queryBuilder
//        ->select(['id', 'city'])
//        ->where('id', '=', '1')
//        ->orWhere('id', '=', '2')
//        ->orWhere('id', '=', '3')
//        ->get());

//var_dump(
//    $queryBuilder
//    ->where('id', '=', '33')
//    ->update(['city' => 'TEST222222'])
//);
