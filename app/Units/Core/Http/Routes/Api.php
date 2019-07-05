<?php

namespace IGestao\Units\Core\Http\Routes;


use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/', function (){
            return 'ops';
        });
    }
}