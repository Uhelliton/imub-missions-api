<?php
namespace IGestao\Domains\Stock\Repositories;

use IGestao\Domains\Stock\StockReduce;
use IGestao\Domains\Stock\Repositories\Contracts\StockReduceInterface;
use IGestao\Domains\Stock\Transformers\StockReduceTransformer;
use IGestao\Domains\Stock\Transformers\StockReduceCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class StockReduceRepository extends AbstractRepository implements StockReduceInterface
{

    /*
     * @var  $model, StockReduce
     * @type instace class
     */
    protected $model = StockReduce::class;


    /*
     * @var  $resourceTransformer, StockReduceTransformer
     * @type instace class
     */
    protected $resourceTransformer = StockReduceTransformer::class;


    /*
    * @var  $collectionTransformer, StockReduceCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = StockReduceCollectionTransformer::class;



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