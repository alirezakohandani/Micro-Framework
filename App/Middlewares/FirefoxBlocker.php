<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\BaseMiddleware;

//block request if come from Firefox browser
class FirefoxBlocker extends BaseMiddleware 
{
    public function handle(Request $request)
    {
       
        $agentKey = 'Gecko/'; 
        if (stripos($request->agent, $agentKey) !==false) {
            echo "Sorry, firefox was Blocked";
            die();
        }
    }
}