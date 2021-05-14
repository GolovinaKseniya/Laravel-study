<?php
require_once '../vendor/autoload.php';

use Facade\DB;


$test = new DB();



var_dump(DB::connection('file'));
