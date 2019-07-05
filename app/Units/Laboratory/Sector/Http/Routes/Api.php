<?php

namespace IGestao\Units\Laboratory\Sector\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/laboratory/sectors', 'SectorController');
    }
}