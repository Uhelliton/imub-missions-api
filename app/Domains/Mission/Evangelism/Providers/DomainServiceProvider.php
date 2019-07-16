<?php
namespace IGestao\Domains\Mission\Evangelism\Providers;

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
            'IGestao\Domains\Mission\Evangelism\Repositories\Contracts\FactsheetInterface',
            'IGestao\Domains\Mission\Evangelism\Repositories\FactsheetRepository'
        );
    }
}