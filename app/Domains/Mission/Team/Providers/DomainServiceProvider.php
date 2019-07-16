<?php
namespace IGestao\Domains\Mission\Team\Providers;

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
            'IGestao\Domains\Mission\Team\Repositories\Contracts\MemberInterface',
            'IGestao\Domains\Mission\Team\Repositories\MemberRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Mission\Team\Repositories\Contracts\TeamInterface',
            'IGestao\Domains\Mission\Team\Repositories\TeamRepository'
        );

        $this->app->bind(
            'IGestao\Domains\Mission\Team\Repositories\Contracts\TeamMemberInterface',
            'IGestao\Domains\Mission\Team\Repositories\TeamMemberRepository'
        );
    }
}