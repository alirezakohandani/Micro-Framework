<?php

namespace App\Core;

use APP\Utilities\Input;

class Request 
{
    /**
     * Request parameter variable
     *
     * @var string
     */
    public $params;
    
    /**
     * Request method variable
     *
     * @var string
     */
    public $method;

    /**
     * Request uri variable
     *
     * @var string
     */
    public $uri;

    /**
     * Request ip variable
     *
     * @var string 
     */
    public $ip;

    /**
     * Request agen variable
     *
     * @var string
     */
    public $agent;

    /**
     * Request referer variable
     *
     * @var string
     */
    public $referer;
    
    /**
     * Set the value for request properties
     * 
     * @return mixed
     */
    public function __construct()
    {
       if (SANITIZE_ALL_DATA) {
           $this->params = Input::clean($_REQUEST);
       } else {
           $this->params = $_REQUEST;
       }
       
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->referer = $_SERVER['HTTP_REFERER'] ?? '';
    }

    /**
     * Checks if there is a property in the Request parameters
     *
     * @param string $key
     * @return boolean
     */
    public function key_exists($key) {
        return in_array($key, array_keys($this->params));
    }

    public function is_in($methods_arr) {
        return in_array($this->method, $methods_arr);
    }

    public function param($key) {
        return $this->params[$key];
    }

    /**
     * Set the value to a property that does not exist
     *
     * @param string $key
     * @return void
     */
    public function __get($key)
    {
        if (!$this->key_exists($key) && IS_DEV_MODE) {
            return "$key property is not exists!";
        } 
            return $this->$key = $this->param($key);
    }
}