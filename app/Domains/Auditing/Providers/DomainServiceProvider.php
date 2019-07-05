<?php
namespace IGestao\Domains\Auditing\Providers;

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
            'IGestao\Domains\Auditing\Repositories\Contracts\LogAccessInterface',
            'IGestao\Domains\Auditing\Repositories\LogAccessRepository'
        );
    }
}