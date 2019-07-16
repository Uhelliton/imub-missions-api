<?php
namespace IGestao\Domains\Mission\Team\Repositories;

use IGestao\Domains\Mission\Team\TeamMember;
use IGestao\Domains\Mission\Team\Repositories\Contracts\TeamMemberInterface;
use IGestao\Domains\Mission\Team\Transformers\TeamMemberTransformer;
use IGestao\Domains\Mission\Team\Transformers\TeamMemberCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class TeamMemberRepository extends AbstractRepository implements TeamMemberInterface
{

    /*
     * @var  $model, TeamMember
     * @type instace class
     */
    protected $model = TeamMember::class;


    /*
     * @var  $resourceTransformer, TeamMemberTransformer
     * @type instace class
     */
    protected $resourceTransformer = TeamMemberTransformer::class;


    /*
    * @var  $collectionTransformer, TeamMemberCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = TeamMemberCollectionTransformer::class;


    /**
     * Método que exclui vários registro da tabela, usando coleção de dados
     *
     * @param string $field
     * @param array $ids
     * @return mixed
     */
    public function deleteWhereIn(string $field, array $ids)
    {
        $delete = $this->model->whereIn($field, $ids)->delete();
        return $delete;
    }


    /**
     * Método que exclui vários registro da tabela, usando paramentros diversos
     *
     * @param array $where
     * @return mixed
     */
    public function deleteWhere($where = array())
    {
        $delete = $this->model->where($where)->delete();
        return $delete;
    }
}