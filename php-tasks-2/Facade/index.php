<?php
require_once '../vendor/autoload.php';

use Facade\DB;

$test = new DB();

DB::connection('mysql');

DB::table('test');
