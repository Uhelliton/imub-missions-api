<?php
namespace IGestao\Domains\User\Repositories\Contracts;

use IGestao\Support\Contracts\Repositories\RepositoryInterface;

interface UserInterface extends RepositoryInterface
{

    /**
     * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param array $attributesUser
     * @param array $attributesRole
     * @param array $attributesPointSale
     * @return mixed
     */
    public function createWithRalationship(array $attributesUser, array $attributesRole, array $attributesPointSale);
}