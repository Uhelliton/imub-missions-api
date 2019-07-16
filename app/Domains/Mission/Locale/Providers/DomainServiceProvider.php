<?php
namespace IGestao\Domains\Mission\Locale\Providers;

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
            'IGestao\Domains\Mission\Locale\Repositories\Contracts\DistrictInterface',
            'IGestao\Domains\Mission\Locale\Repositories\DistrictRepository'
        );
    }
}