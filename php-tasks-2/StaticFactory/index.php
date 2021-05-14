<?php
require_once '../vendor/autoload.php';

use StaticFactory\DBFactory;

$config = include_once "../config/config.php";

$mysqlDBFactory = DBFactory::make($config['mysql']);

$mysqlDBFactory->table('test');
