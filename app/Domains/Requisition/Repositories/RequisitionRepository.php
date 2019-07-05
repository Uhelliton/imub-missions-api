<?php
namespace IGestao\Domains\Requisition\Repositories;

use IGestao\Domains\Requisition\Requisition;
use IGestao\Domains\Requisition\Repositories\Contracts\RequisitionInterface;
use IGestao\Domains\Requisition\Transformers\RequisitionTransformer;
use IGestao\Domains\Requisition\Transformers\RequisitionCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class RequisitionRepository extends AbstractRepository implements RequisitionInterface
{

    /*
     * @var  $model, Requisition
     * @type instace class
     */
    protected $model = Requisition::class;


    /*
     * @var  $resourceTransformer, RequisitionTransformer
     * @type instace class
     */
    protected $resourceTransformer = RequisitionTransformer::class;


    /*
    * @var  $collectionTransformer, RequisitionCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = RequisitionCollectionTransformer::class;


    /**
     * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param array $attributes
     * @param array $attributesRelationship
     * @return mixed
     */
    public function createWithRalationship(array $attributes, array $attributesRelationship)
    {
        $model = $this->model->create($attributes);
        $model = $this->model->find($model->id);
        $model->items()->createMany($attributesRelationship);

        return $this->resourceTransformer::make($model);
    }

}