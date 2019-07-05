<?php
namespace IGestao\Support\Contracts\Repositories;

/*
|--------------------------------------------------------------------------
| Interface Repositório Base
|--------------------------------------------------------------------------
|
*/

interface RepositoryInterface
{

    /**
     * Método que retorna a listagem de todos os dados de uma tabela
     *
     * @param array   $collumns
     * @param int $limit
     * @return Collection
     */
    public function all($collumns = array('*'), int $limit = null);


    /**
     * Método que retorna uma coluna especifica da tabela da tabela
     *
     * @param int $id
     * @param array $collumns
     * @return Model
     */
    public function find(int $id, $collumns = array('*'));



    /**
     * Método que retorna um elemento da tabela, usando paramentros diversos
     *
     * @param array $where
     * @param array $collumns
     * @return Model
     */
    public function findBy(array $where, $collumns = array('*'));


    /**
     * Método que retorna os elementos da tabela, usando paramentros diversos
     *
     * @param array $where
     * @param array $collumns
     * @param int $limit
     * @return Collection
     */
    public function findWhere(array $where, $collumns = array('*'), int $limit = null);



    /**
     * Método que retorna os elementos da tabela, usando paramentros diversos
     *
     * @param string $field
     * @param array $id
     * @param array $where
     * @param array $collumns
     * @param int $limit
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function findWhereIn(string $field, array $id, array $where = array(), $collumns = array('*'), int $limit = null);



    /**
     * Método que retorna a quantidade de registro de uma tablela
     *
     * @param array $where
     * @return int
     */
    public function count(array $where);


    /**
     * Método que retorna a soma de registro por campo de uma tablela
     *
     * @param array $where
     * @param string $field
     * @return mixed
     */
    public function sum(array $where, string $field);


    /**
     * Método que faz a inserção de dados em uma tabela
     *
     * @param array $attributes
     * @exemple create( ['name' => 'Uhelliton', 'email' => 'uhelliton@uol.com.br'] )
     * @return boolean
     */
    public function create(array $attributes);



    /**
     * Método que atualiza dados de uma tabela
     *
     * @param array $attributes
     * @param int $id
     * @exemple update(['name' => 'Uhelliton', 'email' => 'uhelliton@uol.com.br'], 1)
     * @return boolean
     */
    public function update(array $attributes, int $id);


    /**
     * Método que atualiza ou insere um registro na tablela
     *
     * @param array $where
     * @param array $attributes
     * @exemple updateOrInsert(['email' => 'uhelliton@uol.com.br'],  ['name' => 'Uhelliton', 'city' => 'Ps'] )
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function updateOrCreate($where = array(), $attributes);


    /**
     * Método que exclui um registro de uma tabela
     *
     * @param int $id
     * @return boolean
     */
    public function delete(int $id);
}