<?php

namespace IGestao\Application\Core\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->middleware('auth:api')->get('/user', function (Request $request) {
            return $request->user();
        });
    }
}