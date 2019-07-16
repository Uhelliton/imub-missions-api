<?php
namespace IGestao\Domains\Mission\Team\Repositories;

use IGestao\Domains\Mission\Team\Team;
use IGestao\Domains\Mission\Team\Repositories\Contracts\TeamInterface;
use IGestao\Domains\Mission\Team\Transformers\TeamTransformer;
use IGestao\Domains\Mission\Team\Transformers\TeamCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class TeamRepository extends AbstractRepository implements TeamInterface
{

    /*
     * @var  $model, Team
     * @type instace class
     */
    protected $model = Team::class;


    /*
     * @var  $resourceTransformer, TeamTransformer
     * @type instace class
     */
    protected $resourceTransformer = TeamTransformer::class;


    /*
    * @var  $collectionTransformer, MemberCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = TeamCollectionTransformer::class;

}