<?php

 

include 'bootstrap/constants.php';
include 'bootstrap/init.php';
include 'vendor/autoload.php';
include 'helpers/global.php';



// var_dump(config("database"));



// $home_controller = new App\Controllers\HomeController;

 $request = new App\Core\Request();
// echo "<pre>";
// var_dump($request);
// echo "</pre>";


// echo "$request->user is $request->age  years old<br>";

// for keys is not exsists in array
// echo "$request->fuck<br>";

App\Services\Router\Router::start();





