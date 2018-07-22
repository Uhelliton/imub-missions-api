<?php

namespace IGestao\Modules\Denomination\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;


class Web extends RoutesFile
{

    public function routes()
    {
        $this->router->prefix('denomination')->middleware(['guest'])->group( function () {
            $this->router->get('/', ['uses' => 'DashboardController@index'])->name('dashboard.index');
            $this->router->get('/statistics/solicitations/departaments', ['uses' => 'DashboardController@filterQtySolicitationByDepartements']);
        });
    }

}