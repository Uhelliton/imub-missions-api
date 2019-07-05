<?php

namespace IGestao\Units\Core\Http\Middleware;

use Closure;
use IGestao\Support\Services\DatabaseConnectionTenantService;

class DatabaseConnectionTenant
{
    /**
     * Cliente/Inquilino padrao
     */
    private const TENANT_DEFAULT = 1;

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
        $tenantId   = $request->header()['Tenant-Id'][0] ?? self::TENANT_DEFAULT;
        $connection = new DatabaseConnectionTenantService();
        $connection->setConnection($tenantId);

        return $next($request);
    }
}
