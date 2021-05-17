<?php
require_once '../vendor/autoload.php';

use Facade\DB;

$test = new DB();

$с = DB::connection('mysql');

var_dump(DB::$connection);

var_dump(DB::table('test'));
