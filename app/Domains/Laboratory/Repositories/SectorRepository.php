<?php
namespace IGestao\Domains\Laboratory\Repositories;

use IGestao\Domains\Laboratory\Sector;
use IGestao\Domains\Laboratory\Repositories\Contracts\SectorInterface;
use IGestao\Domains\Laboratory\Transformers\SectorTransformer;
use IGestao\Domains\Laboratory\Transformers\SectorCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class SectorRepository extends AbstractRepository implements SectorInterface
{

    /*
     * @var  $model, Sector
     * @type instace class
     */
    protected $model = Sector::class;


    /*
     * @var  $resourceTransformer, SectorTransformer
     * @type instace class
     */
    protected $resourceTransformer = SectorTransformer::class;


    /*
    * @var  $collectionTransformer, SectorCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = SectorCollectionTransformer::class;

}