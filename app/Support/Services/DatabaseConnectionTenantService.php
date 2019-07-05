<?php
namespace IGestao\Support\Services;

use DB;

class DatabaseConnectionTenantService
{

    /**
     * Resposanvel para setar uma novo banco de dados com base na sessao do cliente/inquilino
     *
     * @param int $tenantId
     * @return string
     */
    public function setConnection(int $tenantId)
    {
        $connection = '';
        switch (  $tenantId )
        {
            case config('tenant.tenant_ltr'):
                $connection = DB::setDefaultConnection('yago');
                break;

            case config('tenant.tenant_cltr') :
                $connection = DB::setDefaultConnection('yago_cltr');
                break;
        }

        return $connection;
    }

}