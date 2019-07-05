<?php

namespace IGestao\Units\Laboratory\Product\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->apiResource('/products/categories', 'ProductCategoryController');
        $this->router->apiResource('/products/units/measures', 'ProductUnitMeasureController');
        $this->router->apiResource('/products/images', 'ProductImageController');
        $this->router->apiResource('/products', 'ProductController');
    }
}