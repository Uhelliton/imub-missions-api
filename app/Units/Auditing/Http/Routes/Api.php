<?php

namespace IGestao\Units\Auditing\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/auditing/logs/access', 'LogAccessController');
    }
}