<?php

use Medoo\Medoo;

if(IS_DEV_MODE) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

$medoo = new Medoo(config('database'));
