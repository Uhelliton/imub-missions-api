<?php
namespace IGestao\Domains\Stock\Repositories;

use IGestao\Domains\Stock\StockEntry;
use IGestao\Domains\Stock\Repositories\Contracts\StockEntryInterface;
use IGestao\Domains\Stock\Transformers\StockEntryTransformer;
use IGestao\Domains\Stock\Transformers\StockEntryCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class StockEntryRepository extends AbstractRepository implements StockEntryInterface
{

    /*
     * @var  $model, StockEntry
     * @type instace class
     */
    protected $model = StockEntry::class;


    /*
     * @var  $resourceTransformer, StockEntryTransformer
     * @type instace class
     */
    protected $resourceTransformer = StockEntryTransformer::class;


    /*
    * @var  $collectionTransformer, StockEntryCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = StockEntryCollectionTransformer::class;



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