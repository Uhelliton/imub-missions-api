<?php
namespace IGestao\Units\Setting\User\Providers;

use IGestao\Support\Units\ServiceProvider;

class UnitServiceProvider extends ServiceProvider
{
    protected $hasViews = false;

    protected $hasTranslations =  false;

    protected $providers = [
        RouteServiceProvider::class
    ];

}