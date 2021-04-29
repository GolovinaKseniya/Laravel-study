<?php

include_once "MySQLDBDriver.php";
include_once "MySQLDBBuilder.php";

$config = [
    'db' => 'mysql:host=localhost;dbname=test',
    'user' => 'root',
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

//var_dump($queryBuilder->insert(['id' => 5, 'name' => 'test']));

var_dump(
    $queryBuilder
        ->select(['id', 'city'])
        ->where('id', '=', '1')
        ->orWhere('id', '=', '2')
        ->orWhere('id', '=', '3')
        ->get());

//$queryBuilder->where(1, '=', 1)->get();
//$queryBuilder->insert(['id' => 5, 'name' => 'test']);
//$queryBuilder->select(['id'])->where('id', '=', 1)->orWhere('id', '=', 5)->get();
//$queryBuilder->where('name', '=', 'test')->update(['name' => 'new_test']);
//$queryBuilder->where('name', '=', 'new_test')->delete();