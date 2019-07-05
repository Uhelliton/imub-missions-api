<?php
namespace IGestao\Domains\Stock\Providers;

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
            'IGestao\Domains\Stock\Repositories\Contracts\StockInterface',
            'IGestao\Domains\Stock\Repositories\StockRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Stock\Repositories\Contracts\ReasonEntryInterface',
            'IGestao\Domains\Stock\Repositories\ReasonEntryRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Stock\Repositories\Contracts\ReasonReduceInterface',
            'IGestao\Domains\Stock\Repositories\ReasonReduceRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Stock\Repositories\Contracts\StockEntryInterface',
            'IGestao\Domains\Stock\Repositories\StockEntryRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Stock\Repositories\Contracts\StockReduceInterface',
            'IGestao\Domains\Stock\Repositories\StockReduceRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Stock\Repositories\Contracts\IndicatorTableInterface',
            'IGestao\Domains\Stock\Repositories\IndicatorTableRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Stock\Repositories\Contracts\StockStatisticInterface',
            'IGestao\Domains\Stock\Repositories\StockStatisticRepository'
        );
    }
}