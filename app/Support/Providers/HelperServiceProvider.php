<?php

namespace Igestao\Support\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap qualquer serviço de aplicação.
     */
    public function boot()
    {
        //
    }

    /**
     * Registre todos os serviços de aplicativos.
     */
    public function register()
    {
        require __DIR__ .'/../Helpers/StringHelper.php';
        require __DIR__ .'/../Helpers/SafeInjectionHelper.php';
        require __DIR__ .'/../Helpers/AppHelper.php';
    }
}
