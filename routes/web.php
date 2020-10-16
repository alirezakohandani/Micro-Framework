<?php

return array(
    '/' => [
        'target' => 'HomeController@index'
    ],
    '/auth/login' => [
        'method' => 'get|post',
        'target' => 'AuthController@login',
        'middleware' => 'AuthMiddleware@handle'
       
    ],
    '/auth/register' => [
        'target' => 'AuthController@register'
    ]
);