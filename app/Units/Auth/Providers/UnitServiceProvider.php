<?php

namespace IGestao\Units\Auth\Providers;

use IGestao\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $hasViews = false;

    protected $hasTranslations = false;

    protected $providers = [
        AuthServiceProvider::class,
        RouteServiceProvider::class
    ];
}
