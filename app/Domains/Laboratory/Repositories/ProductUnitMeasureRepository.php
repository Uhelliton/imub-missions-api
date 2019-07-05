<?php
namespace IGestao\Domains\Laboratory\Repositories;

use IGestao\Domains\Laboratory\ProductUnitMeasure;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductUnitMeasureInterface;
use IGestao\Domains\Laboratory\Transformers\ProductUnitMeasureTransformer;
use IGestao\Domains\Laboratory\Transformers\ProductUnitMeasureCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class ProductUnitMeasureRepository extends AbstractRepository implements ProductUnitMeasureInterface
{

    /*
     * @var  $model, ProductUnitMeasure
     * @type instace class
     */
    protected $model = ProductUnitMeasure::class;


    /*
     * @var  $resourceTransformer, ProductUnitMeasureTransformer
     * @type instace class
     */
    protected $resourceTransformer = ProductUnitMeasureTransformer::class;


    /*
    * @var  $collectionTransformer, ProductUnitMeasureCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = ProductUnitMeasureCollectionTransformer::class;

}