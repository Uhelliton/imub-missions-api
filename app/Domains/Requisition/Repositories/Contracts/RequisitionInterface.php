<?php
namespace IGestao\Domains\Requisition\Repositories\Contracts;

use IGestao\Support\Contracts\Repositories\RepositoryInterface;

interface RequisitionInterface extends RepositoryInterface
{

    /**
     * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param array $attributes
     * @param array $attributesRelationship
     * @return mixed
     */
    public function createWithRalationship(array $attributes, array $attributesRelationship);
}