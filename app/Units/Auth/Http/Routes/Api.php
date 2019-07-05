<?php

namespace IGestao\Units\Auth\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->prefix('auth')->group(function () {
            $this->router->post('users', ['uses' => 'AuthController@authenticate']);
        });
    }
}