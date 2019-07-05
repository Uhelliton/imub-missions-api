<?php
namespace IGestao\Domains\User\Providers;

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
            'IGestao\Domains\User\Repositories\Contracts\UserInterface',
            'IGestao\Domains\User\Repositories\UserRepository'
        );

        $this->app->bind(
            'IGestao\Domains\User\Repositories\Contracts\RoleInterface',
            'IGestao\Domains\User\Repositories\RoleRepository'
        );
    }
}