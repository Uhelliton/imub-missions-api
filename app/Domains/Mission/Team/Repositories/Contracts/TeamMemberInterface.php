<?php
namespace IGestao\Domains\Mission\Team\Repositories\Contracts;

use IGestao\Support\Contracts\Repositories\RepositoryInterface;

interface TeamMemberInterface extends RepositoryInterface
{

    /**
     * Método que exclui vários registro da tabela, usando coleção de dados
     *
     * @param string $field
     * @param array $ids
     * @return mixed
     */
    public function deleteWhereIn(string $field, array $ids);

    /**
     * Método que exclui vários registro da tabela, usando paramentros diversos
     *
     * @param array $where
     * @return mixed
     */
    public function deleteWhere($where = array());
}