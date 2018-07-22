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
     * Método que retorna a listagem dados de uma tabela,
     * porém usando relacionamento vinculado ao modelo
     *
     * @param array   $relations
     * @exemple with(['papel, 'permissao'])
     *
     * @return Collection
     */
    public function with(array $relations);



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
     * Método resposável para listar os dados da tabela, usando paginacao
     *
     * @param int   $limit
     * @param array $collumns
     * @return Collection
     */
    public function paginate(int $limit  = 10, $collumns = array('*'));



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
     * Método que exclui um registro de uma tabela
     *
     * @param int $id
     * @return boolean
     */
    public function delete(int $id);
}