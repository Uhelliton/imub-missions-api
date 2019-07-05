<?php
namespace IGestao\Domains\Stock\Repositories;

use IGestao\Domains\Stock\ReasonReduce;
use IGestao\Domains\Stock\Repositories\Contracts\ReasonReduceInterface;
use IGestao\Domains\Stock\Transformers\ReasonReduceCollectionTransformer;
use IGestao\Domains\Stock\Transformers\ReasonReduceTransformer;
use IGestao\Support\Repository\AbstractRepository;

class ReasonReduceRepository extends AbstractRepository implements ReasonReduceInterface
{

    /*
     * @var  $model, ReasonReduce
     * @type instace class
     */
    protected $model = ReasonReduce::class;


    /*
     * @var  $resourceTransformer, ReasonReduceTransformer
     * @type instace class
     */
    protected $resourceTransformer = ReasonReduceTransformer::class;


    /*
    * @var  $collectionTransformer, ReasonReduceCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = ReasonReduceCollectionTransformer::class;

}