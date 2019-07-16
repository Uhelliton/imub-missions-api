<?php
namespace IGestao\Domains\Membership\Providers;

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
            'IGestao\Domains\Membership\Repositories\Contracts\GenderInterface',
            'IGestao\Domains\Membership\Repositories\GenderRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Membership\Repositories\Contracts\CivilStatusInterface',
            'IGestao\Domains\Membership\Repositories\CivilStatusRepository'
        );
    }
}