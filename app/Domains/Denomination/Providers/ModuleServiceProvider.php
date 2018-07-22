<?php

namespace IGestao\Modules\Denomination\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap os serviços do módulo.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'dashboard');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'dashboard');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations', 'dashboard');
    }

    /**
     * Registra os serviços do módulo.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
