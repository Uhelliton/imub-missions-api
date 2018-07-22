<?php
namespace IGestao\Application\Core\Http\Routes;

use IGestao\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Inspiring;

class Console extends RoutesFile
{
    /*
    |--------------------------------------------------------------------------
    | Console Routes
    |--------------------------------------------------------------------------
    |
    | This file is where you may define all of your Closure based console
    | commands. Each Closure is bound to a command instance allowing a
    | simple approach to interacting with each command's IO methods.
    |
    */

    public function routes()
    {
        Artisan::command('inspire', function () {
            $this->comment(Inspiring::quote());
        })->describe('Display an inspiring quote');
    }
}