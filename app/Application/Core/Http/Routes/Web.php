<?php

namespace IGestao\Application\Core\Http\Routes;

use Caffeinated\Themes\Theme;
use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Web extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/', function (){});
    }
}