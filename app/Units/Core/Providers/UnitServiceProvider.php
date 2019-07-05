<?php

namespace IGestao\Units\Core\Providers;

use IGestao\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $hasViews = false;

    protected $hasTranslations =  false;

    protected $providers = [
        EventServiceProvider::class,
        BroadcastServiceProvider::class,
        RouteServiceProvider::class
    ];
}
