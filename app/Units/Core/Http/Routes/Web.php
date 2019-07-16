<?php

namespace IGestao\Units\Core\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Web extends RoutesFile
{
    public function routes()
    {
        $this->router->any('/', function () {
            return \File::get( public_path() . "index.html" );
        });
    }
}