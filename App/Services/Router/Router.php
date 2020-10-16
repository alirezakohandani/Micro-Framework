<?php

namespace App\Services\Router;

use App\Core\Request;

class Router{

    private static $routes;
    const baseController = "App\Controllers\\";
    const baseMiddlewares = 'App\Middlewares\\';

   

    public static function start() {
        // echo "router starts!";
        // get all routes (load address book)
        $routes = self::get_all_routes();
        // check if route exists
        $current_uri = self::get_current_route();
       

        if (self::route_exists($current_uri)) {
            // echo "yes";
            //refactoring(!)
            $request = new Request();
            $allowed_methods = self::get_route_methods($current_uri);
             if (!$request->is_in($allowed_methods)) {
                header('HTTP/1.0 403 Forbidden');
                echo "403.php";
                //view::load('errors.403');
                die();
             }

             //do right things
            $targetStr = $routes[$current_uri]['target'];
            list($controller, $method) = explode('@', $targetStr);
            $controller = self::baseController . $controller;
            $controller_object = new $controller;
            $controller_object->$method();
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "404.php</br>";
            // view::load('errors.404');
            die();
        }
        // if route not exists : 404.php
        // get route target (Controller & Method)
        // create an object from target Controller and call the method (ghesmate 1 dakhele shekle loghman)
        //
    }
    public static function get_all_routes() {
        return include BASE_PATH . "routes/web.php"; 
    }
    public static function route_exists($route) {
        $routes = self::get_all_routes();
        return in_array($route, array_keys($routes));
    }
    public static function get_route_target($route) {
        return self::$routes[$route]['target'];
    }
    public static function get_current_route() {
        $current_uri  = str_replace(SUB_DIRECTORY, '', $_SERVER['REQUEST_URI']);
        return $current_uri;
    }
    public static function get_route_methods ($route) {
        $routes = self::get_all_routes();
        $methods_str =  $routes[$route]['method'];
        return explode('|', $methods_str);
        
    }
    public static function get_route_middleware ($route) {
        if (array_key_exists('middleware', self::$routes[$route])) {
            return self::$routes[$route]['middleware'];
        }
        return null;
    }
}