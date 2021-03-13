<?php

namespace App\Middlewares;

use App\Core\Request;
use App\Middlewares\Contract\BaseMiddleware;

class FirefoxBlocker extends BaseMiddleware 
{
    /**
     * block request if come from firefox browser
     *
     * @param Request $request
     * @return void
     */
    public function handle(Request $request)
    {
        $agentKey = 'Gecko/'; 
        if (stripos($request->agent, $agentKey) !==false) {
            echo "Sorry, firefox was blocked";
            die();
        }
    }
}