<?php
namespace IGestao\Domains\Membership\Repositories;

use IGestao\Domains\Membership\CivilStatus;
use IGestao\Domains\Membership\Repositories\Contracts\CivilStatusInterface;
use IGestao\Domains\Membership\Transformers\CivilStatusTransformer;
use IGestao\Domains\Membership\Transformers\CivilStatusCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class CivilStatusRepository extends AbstractRepository implements CivilStatusInterface
{

    /*
     * @var  $model, CivilStatus
     * @type instace class
     */
    protected $model = CivilStatus::class;


    /*
     * @var  $resourceTransformer, CivilStatusTransformer
     * @type instace class
     */
    protected $resourceTransformer = CivilStatusTransformer::class;


    /*
    * @var  $collectionTransformer, CivilStatusCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = CivilStatusCollectionTransformer::class;

}