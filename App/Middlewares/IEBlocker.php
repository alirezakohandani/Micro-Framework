<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\BaseMiddleware;

class IEBlocker extends BaseMiddleware 
{
    /**
     * block request if come from IE browser
     *
     * @param Request $request
     * @return void
     */
    public function handle(Request $request)
    {
        $agentKey = 'Trident/'; 
        if (stripos($request->agent, $agentKey) !==false) {
            echo "Sorry, IE was blocked";
            die();
        }
    }
}