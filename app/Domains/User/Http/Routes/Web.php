<?php

namespace Yago\Modules\User\Http\Routes;

use Yago\Support\Http\Routing\RoutesFile;
use Illuminate\Support\Facades\Route;
use Sentinel;

class Web extends RoutesFile
{

    public function routes()
    {
        $this->router->get('/', function () {
            if( Sentinel::check() ) {
                return redirect()->route('dashboard.index');
            }
            return view('user::login');
        })->name('user.login');

        $this->router->middleware(['guest', 'session.route'])->group( function () {

            $this->router->resource('/users', 'UserController', [
                'names' => [
                    'index'  => 'user.index',
                    'store'  => 'user.store',
                    'create' => 'user.create',
                    'update' => 'user.update',
                    'edit'   => 'user.edit',
                ], 'except'  => ['show']
            ]);

            $this->router->put('/users/{id}/change/password', ['uses' => 'UserController@changePassword'])->name('user.password.update');

            $this->router->resource('users/permissions', 'PermissionGroupController', [
                'names' => [
                    'index'  => 'user.permission.index',
                    'store'  => 'user.permission.store',
                    'create' => 'user.permission.create',
                    'update' => 'user.permission.update',
                    'edit'   => 'user.permission.edit',
                ], 'except'  => ['show']
            ]);
        });

    }

}