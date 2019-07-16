<?php

namespace IGestao\Units\ProjectMissionary\Evangelism\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/missions/evangelism/factsheet', 'FactsheetController');

    }
}