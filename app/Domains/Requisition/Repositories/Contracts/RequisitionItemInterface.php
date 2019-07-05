<?php
namespace IGestao\Domains\Requisition\Repositories\Contracts;

use IGestao\Support\Contracts\Repositories\RepositoryInterface;

interface RequisitionItemInterface extends RepositoryInterface
{

    /**
     * Método resposável para atualizar dados em massa
     *
     * @param string $field
     * @param array $id
     * @param array $attibutes
     * @return mixed
     */
    public function updateWhereIn(string $field, array $id, array $attibutes = array());
}