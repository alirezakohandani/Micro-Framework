<?php

include 'bootstrap/constants.php';
include 'bootstrap/init.php';
include 'vendor/autoload.php';
include 'helpers/global.php';

$request = new App\Core\Request();

App\Services\Router\Router::start();





