<?php
namespace IGestao\Domains\Requisition\Providers;

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
            'IGestao\Domains\Requisition\Repositories\Contracts\RequisitionInterface',
            'IGestao\Domains\Requisition\Repositories\RequisitionRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Requisition\Repositories\Contracts\RequisitionItemInterface',
            'IGestao\Domains\Requisition\Repositories\RequisitionItemRepository'
        );


        $this->app->bind(
            'IGestao\Domains\Requisition\Repositories\Contracts\RequisitionStatisticInterface',
            'IGestao\Domains\Requisition\Repositories\RequsitionStatisticRepository'
        );
    }
}