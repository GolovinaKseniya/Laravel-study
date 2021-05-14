<?php

require_once '../vendor/autoload.php';

$config = [
    'db' => 'mysql:host=localhost;dbname=test',
    'user' => 'root',
    'pass' => '123456'
];

$db = new MySQLDBBuilder\MySQLDBDriver($config);

$queryBuilder = new MySQLDBBuilder\MySQLDBBuilder($db, 'test');


var_dump($queryBuilder
->where('city', '=', 'Ukraine')
->where('id', '=', 4)
->orWhere('id', '=', 33)
->orWhere('city', '=', 'Mexico22')
->get());
