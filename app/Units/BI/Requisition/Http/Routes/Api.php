<?php

namespace IGestao\Units\BI\Requisition\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;

class Api extends RoutesFile
{
    public function routes()
    {
        $this->router->get('/bi/statistics/requisitions/latest/days', [
            'uses' => 'RequisitionStatisticController@getRequisitionLatestCountingPerDay'
        ]);

        $this->router->post('/bi/statistics/requisitions/outputs/products', [
            'uses' => 'RequisitionStatisticController@getRequisitionsByPeriodsOfDates'
        ]);
    }
}