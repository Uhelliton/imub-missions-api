<?php

namespace IGestao\Units\BI\Product\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/bi/statistics/products/greater/output', [
            'uses' => 'ProductStatisticController@getProductsWithGreaterOutput'
        ]);
    }
}