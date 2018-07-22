<?php

namespace IGestao\Modules\Denomination\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use IGestao\Modules\Denomination\Http\Routes\Web;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Este espaço de nome é aplicado às rotas do controlador.
     * Além disso, ele é definido como o espaço de nomes da raiz do gerador de URL.
     *
     * @var string
     */
    protected $namespace = 'IGestao\Modules\Denomination\Http\Controllers';

    /**
     * Defina as ligações do seu modelo de rota, filtros padrão, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the module.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Defina as rotas "web" para o módulo.
     * Estas rotas recebem estado de sessão, proteção CSRF, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        (new Web([
            'middleware' => ['web'],
            'namespace'  => $this->namespace
        ]))->register();
    }

}
