<?php
namespace App\Controllers;

use App\Core\Request;
use App\Services\View\View;

class ProductController {
    // public function __construct() {
    //     echo "Im in Controller";
    // }
    public function detail(Request $request) {
        // var_dump($request->params);
        // $product_model = new Product();

        // $data = array(
        //     'product' => $product_model->find($request->params('pid')),
        //     'form_title' => "فرم لاگین"
        // );

        // View::load('auth.login-form', $data);
     
    }
    public function register(Request $request) {
        echo "register page<br>";
    }
  
}