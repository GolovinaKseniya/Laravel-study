<?php
require_once '../vendor/autoload.php';

use Facade\DB;

var_dump(DB::connection('mysql'));
