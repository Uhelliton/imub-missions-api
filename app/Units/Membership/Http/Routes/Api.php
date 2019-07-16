<?php

namespace IGestao\Units\Membership\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/membership/genders', 'GenderController');
        $this->router->apiResource('/membership/civil/status', 'CivilStatusController');
    }
}