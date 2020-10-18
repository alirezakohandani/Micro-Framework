<?php

namespace App\Controllers;

class HomeController {
    public function __construct()
    {
        echo "Im HomeController<br>";
    }
    public function index() {
        echo "index method in HomeController class";
    }
}