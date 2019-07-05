<?php
namespace IGestao\Units\Laboratory\Providers;

use IGestao\Support\Units\ServiceProvider;


class UnitServiceProvider extends ServiceProvider
{
    protected $hasViews = false;

    protected $hasTranslations =  false;

    protected $providers = [
        \IGestao\Units\Laboratory\Product\Providers\RouteServiceProvider::class,
        \IGestao\Units\Laboratory\Sector\Providers\RouteServiceProvider::class
    ];

}