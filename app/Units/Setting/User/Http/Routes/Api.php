<?php

namespace IGestao\Units\Setting\User\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/users/roles', 'RoleController');
        $this->router->apiResource('/users', 'UserController');
    }
}