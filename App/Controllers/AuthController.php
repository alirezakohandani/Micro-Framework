<?php
namespace App\Controllers;

use App\Core\Request;
use App\Services\View\View;

class AuthController {
    // public function __construct() {
    //     echo "Im in Controller";
    // }
    public function login(Request $request) {
        // var_dump($request->params);
        $data = array(
            'age' => 27,
            'form_title' => "فرم لاگین"
        );

        View::load('auth.login-form', $data);
     
    }
    public function register(Request $request) {
        echo "register page<br>";
    }
  
}