<?php
namespace IGestao\Domains\Laboratory\Providers;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Registre todos os serviços do domínio.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'IGestao\Domains\Laboratory\Repositories\Contracts\SectorInterface',
            'IGestao\Domains\Laboratory\Repositories\SectorRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Laboratory\Repositories\Contracts\ProductInterface',
            'IGestao\Domains\Laboratory\Repositories\ProductRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Laboratory\Repositories\Contracts\ProductStatisticInterface',
            'IGestao\Domains\Laboratory\Repositories\ProductStatisticRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Laboratory\Repositories\Contracts\ProductCategoryInterface',
            'IGestao\Domains\Laboratory\Repositories\ProductCategoryRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Laboratory\Repositories\Contracts\ProductUnitMeasureInterface',
            'IGestao\Domains\Laboratory\Repositories\ProductUnitMeasureRepository'
        );
    }
}