<?php

namespace IGestao\Units\ProjectMissionary\Locale\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/missions/locales/cities/{id}/disticts', 'DistrictController@getDistrictByCity');

    }
}