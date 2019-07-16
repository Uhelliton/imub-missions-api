<?php
namespace IGestao\Domains\Membership\Repositories;

use IGestao\Domains\Membership\Gender;
use IGestao\Domains\Membership\Repositories\Contracts\GenderInterface;
use IGestao\Domains\Membership\Transformers\GenderTransformer;
use IGestao\Domains\Membership\Transformers\GenderCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class GenderRepository extends AbstractRepository implements GenderInterface
{

    /*
     * @var  $model, Gender
     * @type instace class
     */
    protected $model = Gender::class;


    /*
     * @var  $resourceTransformer, GenderTransformer
     * @type instace class
     */
    protected $resourceTransformer = GenderTransformer::class;


    /*
    * @var  $collectionTransformer, GenderCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = GenderCollectionTransformer::class;

}