<?php

namespace Yago\Modules\User\Providers;

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
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'user');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'user');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations', 'user');
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
