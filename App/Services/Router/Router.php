<?php

namespace App\Services\Router;

class Router{

    private static $routes;
    const baseController = "App\Controllers\\";
    const baseMiddlewares = 'App\Middlewares\\';

    public static function get_all_routes() {
        return include BASE_PATH . "routes/web.php"; 
    }

    public static function start() {
        // echo "router starts!";
        // get all routes (load address book)
        $routes = self::get_all_routes();
        // check if route exists
        $current_uri  = str_replace('/micro-framework/', '', $_SERVER['REQUEST_URI']);
       
        if (array_key_exists($current_uri, $routes)) {
            // echo "yes";
        
            
            $targetStr = $routes[$current_uri]['target'];
            list($controller, $method) = explode('@', $targetStr);
            $controller = self::baseController . $controller;
            $controller_object = new $controller;
            $controller_object->$method();
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "404.php</br>";
        }
        // if route not exists : 404.php
        // get route target (Controller & Method)
        // create an object from target Controller and call the method (ghesmate 1 dakhele shekle loghman)
        //

      
    }
}