<?php
require_once '../vendor/autoload.php';

use StaticFactory\DBFactory;


$config = include_once "../config/config.php";

//var_dump($config);


$mysqlDbFactory = DBFactory::make(["file" => $config['file']]);

var_dump($mysqlDbFactory);