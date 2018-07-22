<?php

namespace IGestao\Domains\Membership\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;


class Api extends RoutesFile
{

    public function routes()
    {
        $this->router->prefix('membership')->group( function () {
            $this->router->get('/', function (){

                return 1;
            });
        });
    }

}