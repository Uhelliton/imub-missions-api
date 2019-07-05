<?php
namespace IGestao\Domains\Stock\Repositories;

use IGestao\Domains\Stock\ReasonEntry;
use IGestao\Domains\Stock\Repositories\Contracts\ReasonEntryInterface;
use IGestao\Domains\Stock\Transformers\ReasonEntryCollectionTransformer;
use IGestao\Domains\Stock\Transformers\ReasonEntryTransformer;
use IGestao\Support\Repository\AbstractRepository;

class ReasonEntryRepository extends AbstractRepository implements ReasonEntryInterface
{

    /*
     * @var  $model, ReasonEntry
     * @type instace class
     */
    protected $model = ReasonEntry::class;


    /*
     * @var  $resourceTransformer, ReasonEntryTransformer
     * @type instace class
     */
    protected $resourceTransformer = ReasonEntryTransformer::class;


    /*
    * @var  $collectionTransformer, ReasonEntryCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = ReasonEntryCollectionTransformer::class;

}