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
        $this->app->register(RouteServiceProvider::class);

        /*$this->app->bind(
            'Yago\Domains\Agenda\Contracts\EventInterface',
            'Yago\Domains\Agenda\Repositories\EventRepository'
        );*/
    }
}