<?php

require_once '../vendor/autoload.php';

use Factory\FileDBConnection;
use Factory\MySQLDBConnection;

$config = [
    'db' => 'mysql:host=localhost;dbname=test',
    'user' => 'root',
    'pass' => '123456'
];

$config_file = [
    'extension' => '.txt',
    'path' => 'storage'
];

$mysqlDbFactory = new MySQLDBConnection($config);
$mysqlDbBuilder = $mysqlDbFactory->table('test');

$fileDbFactory = new FileDBConnection($config_file);
$fileDbBuilder = $fileDbFactory->table('test');
