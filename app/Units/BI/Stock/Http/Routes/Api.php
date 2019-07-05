<?php

namespace IGestao\Units\BI\Stock\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/bi/statistics/indicators/tables', ['uses' => 'IndicatorTableController@getPostingsByTable']);

        $this->router->post('/bi/statistics/stock/entries/outputs/products', [
            'uses' => 'StockStatisticsController@getProductsEntriesOutuptsByPeriodsOfDates'
        ]);

        $this->router->post('/bi/statistics/stock/inventory', [
            'uses' => 'StockStatisticsController@getStockInventoryByPeriodsOfDates'
        ]);
    }
}