<?php

namespace IGestao\Domains\Membership\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use IGestao\Domains\Membership\Http\Routes\Api;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Este espaço de nome é aplicado às rotas do controlador.
     * Além disso, ele é definido como o espaço de nomes da raiz do gerador de URL.
     *
     * @var string
     */
    protected $namespace = 'IGestao\Domains\Membership\Http\Controllers';

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
     * Defina as rotas para o módulo
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
    }

    /**
     * Defina as rotas "api" para o módulo.
     * Estas rotas recebem estado de sessão, proteção CSRF, etc.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        (new Api([
            'prefix' => 'api',
            'middleware' => ['web'],
            'namespace'  => $this->namespace
        ]))->register();
    }

}
