<?php

namespace App\Core;

use APP\Utilities\Input;

class Request 
{
    public $method;
    public $uri;
    public $ip;
    public $agent;
    public $referer;
    public $params; // $_REQUEST

   
    public function __construct()
    {
       if (SANITIZE_ALL_DATA) {
           $this->params = Input::clean($_REQUEST);
       } else {
        $this->params = $_REQUEST;
       }
       
//         $keys = array_keys($this->params);
//          foreach($keys as $key) {
//               $this->{$key} = $this->param($key);
//              }
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->referer = $_SERVER['HTTP_REFERER'] ?? '';
      
    }
    //in function gharae index va kelide arraye request ra begiorad va meghdaro bargardanad
    public function key_exists($key) {
        return in_array($key, array_keys($this->params));
    }

    public function param($key) {
        return $this->params[$key];
    }

    // public function __set($key, $value)
    // {
    //     echo "this is new property";
    // }

    public function __get($key)
    {
        if ($this->key_exists($key)) {
            return $this->{$key} = $this->param($key);
        } 
        //for developer -- if dev_mode is on,  send notification for developer
        else {
            // notify programmer
            echo "key is not exists!";
        }
    }
}