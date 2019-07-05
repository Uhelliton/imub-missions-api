<?php
namespace IGestao\Units\Auditing\Providers;
use Illuminate\Support\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    /**
     * Registre todos os serviços da unidade.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}