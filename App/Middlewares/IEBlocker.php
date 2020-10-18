<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\BaseMiddleware;

//block request if come from IE browser
class IEBlocker extends BaseMiddleware 
{
    public function handle(Request $request)
    {
       
        $agentKey = 'Trident/'; 
        if (stripos($request->agent, $agentKey) !==false) {
            echo "Sorry, IE was Blocked";
            die();
        }
    }
}