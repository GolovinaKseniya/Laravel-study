<?php
require_once '../vendor/autoload.php';

use StaticFactory\DBFactory;

$config = include_once "../config/config.php";

$mysqlDBFactory = DBFactory::make($config['connections']['file']);

var_dump($mysqlDBFactory);

$mysqlDBFactory->table('test');
