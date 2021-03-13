<?php

namespace App\Services\Router;

use App\Core\Request;
use App\Services\View\View;

class Router
{
    const baseController = "App\Controllers\\";
    const baseMiddlewares = 'App\Middlewares\\';

    /**
     * Start router service
     *
     * @return void
     */
    public static function start() 
    {
        $current_uri = self::get_current_route();

        if (self::route_exists($current_uri)) {
            $request = new Request();
            $allowed_methods = self::get_route_methods($current_uri);
             if (!$request->is_in($allowed_methods)) {
                header('HTTP/1.0 403 Forbidden');
                View::load('errors.403');
                die();
             }
             
             if (self::has_middleware($current_uri)) {
             $middlewares = self::get_route_middlewares($current_uri);
                foreach ($middlewares as $middleware) {
                    $middlewareClass = self::baseMiddlewares . $middleware;
                        if (!class_exists($middlewareClass)) {
                            echo "Error: Class $middlewareClass was not found!";
                            die();
                    }
                            $middlewareObj = new $middlewareClass;
                            $middlewareObj->handle($request);
                }
             }

            $targetStr = self::get_route_target($current_uri);
            list($controller, $method) = explode('@', $targetStr);
            $controller = self::baseController . $controller;
    
            if (!class_exists($controller)) {
                echo "class $controller was not found";
                die();
            }
               
            $controller_object = new $controller;
            if (!method_exists($controller_object, $method)) {
                echo "Error: Method $method was not found in $controller";
                die();
            }
            
            $controller_object->$method($request);
            } else {
                header("HTTP/1.0 404 Not Found");
                view::load('errors.404');
                die();
            }
    }

    /**
     * Returns all routes
     *
     * @return void
     */
    public static function get_all_routes() {
        return include BASE_PATH . "routes/web.php"; 
    }

    /**
     * Check the existence of the route
     *
     * @param string $route
     * @return boolean
     */ 
    public static function route_exists($route) {
        $routes = self::get_all_routes();
        return in_array($route, array_keys($routes));
    }

    /**
     * Returns request target
     *
     * @param [type] $route
     * @return void
     */
    public static function get_route_target($route) {
        $routes = self::get_all_routes();
        return $routes[$route]['target'];
    }

    /**
     * Returns current route
     *
     * @return void
     */
    public static function get_current_route() {
        $current_uri  = str_replace(SUB_DIRECTORY, '', $_SERVER['REQUEST_URI']);
        return strtok($current_uri, '?');
    }

    /**
     * Returns request method
     *
     * @param string $route
     * @return void
     */
    public static function get_route_methods($route) {
        $routes = self::get_all_routes();
        $methods_str =  strtolower($routes[$route]['method']);
        return explode('|', $methods_str);
    }

    /**
     * Returns request middleware
     *
     * @param string $route
     * @return void
     */
    public static function get_route_middlewares($route) {
        $routes = self::get_all_routes();
        if (array_key_exists('middleware', $routes[$route])) {
            $middlewareStr = GLOBAL_MIDDLEWARES . "|" . ($routes[$route]['middleware'] ?? '');
            return removeEmptyMembers(explode('|', $middlewareStr));
        }
            return null;
    }

    /**
     * Checks middleware exists
     *
     * @param string $route
     * @return boolean
     */
    public static function has_middleware($route) {
        $routes = self::get_all_routes();
        return isset($routes[$route]['middleware']) or !empty(GLOBAL_MIDDLEWARES);
       
    }
}