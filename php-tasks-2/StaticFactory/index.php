<?php
require_once '../vendor/autoload.php';

use StaticFactory\DBFactory;

$config = include_once "../config/config.php";

$mysqlDbFactory = DBFactory::make($config['file']);
