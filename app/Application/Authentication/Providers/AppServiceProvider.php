<?php

namespace IGestao\Application\Authentication\Providers;

use Illuminate\Support\ServiceProvider;
use IGestao\Application\Authentication\Providers\AuthServiceProvider;
use IGestao\Application\Authentication\Providers\RouteServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(){}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(AuthServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
