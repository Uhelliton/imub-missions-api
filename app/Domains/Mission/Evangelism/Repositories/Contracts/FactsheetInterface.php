<?php
namespace IGestao\Domains\Mission\Evangelism\Repositories\Contracts;

use IGestao\Support\Contracts\Repositories\RepositoryInterface;

interface FactsheetInterface extends RepositoryInterface
{

    /* * Método que faz a inserção de dados em uma tabela com relacionamento
    *
    * @param array $attributes
    * @param array $attributesRelationship
    * @return mixed
    */
    public function createWithRalationship(array $attributes, array $attributesRelationship);


    /**
     * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param int  $id
     * @param array $attributes
     * @param array $attributesRelationship
     * @return mixed
     */
    public function updateWithRalationship(int $id, array $attributes, array $attributesRelationship);
}