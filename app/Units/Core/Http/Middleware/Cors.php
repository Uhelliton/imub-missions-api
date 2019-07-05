<?php

namespace IGestao\Units\Core\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Middleware para autorizacao de acessso de dominios externos
     * evita erros comuns Access-Control-Allow-Origin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->getMethod() == "OPTIONS") {
            return response(['OK'], 200)->withHeaders([
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, PATCH, DELETE',
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Allow-Headers' => 'Authorization, Content-Type, Tenant-Id',
            ]);
        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE')
            ->header('Access-Control-Allow-Credentials', true)
            ->header('Access-Control-Allow-Headers', 'Authorization,Content-Type');
    }
}
