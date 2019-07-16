<?php
namespace IGestao\Domains\Mission\Locale\Repositories;

use IGestao\Domains\Mission\Locale\District;
use IGestao\Domains\Mission\Locale\Repositories\Contracts\DistrictInterface;
use IGestao\Domains\Mission\Locale\Transformers\DistrictTransformer;
use IGestao\Domains\Mission\Locale\Transformers\DistrictCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class DistrictRepository extends AbstractRepository implements DistrictInterface
{

    /*
     * @var  $model, District
     * @type instace class
     */
    protected $model = District::class;


    /*
     * @var  $resourceTransformer, DistrictTransformer
     * @type instace class
     */
    protected $resourceTransformer = DistrictTransformer::class;


    /*
    * @var  $collectionTransformer, DistrictCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = DistrictCollectionTransformer::class;


}