<?php

namespace IGestao\Units\Core\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Web extends RoutesFile
{
    public function routes()
    {
        $this->router->any('/', function () {
            return 'bem vindo a api igestao';
        });
    }
}