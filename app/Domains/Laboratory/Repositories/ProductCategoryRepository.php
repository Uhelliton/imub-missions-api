<?php
namespace IGestao\Domains\Laboratory\Repositories;

use IGestao\Domains\Laboratory\ProductCategory;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductCategoryInterface;
use IGestao\Domains\Laboratory\Transformers\ProductCategoryTransformer;
use IGestao\Domains\Laboratory\Transformers\ProductCategoryCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class ProductCategoryRepository extends AbstractRepository implements ProductCategoryInterface
{

    /*
     * @var  $model, ProductCategory
     * @type instace class
     */
    protected $model = ProductCategory::class;


    /*
     * @var  $resourceTransformer, ProductCategoryTransformer
     * @type instace class
     */
    protected $resourceTransformer = ProductCategoryTransformer::class;


    /*
    * @var  $collectionTransformer, ProductCategoryCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = ProductCategoryCollectionTransformer::class;

}