<?php

return array(
    '/' => [
        'target' => 'HomeController@index'
    ],
    'auth/login' => [
        'target' => 'AuthController@login'
       
    ],
    'auth/register' => [
        'target' => 'AuthController@register'
    ]
);