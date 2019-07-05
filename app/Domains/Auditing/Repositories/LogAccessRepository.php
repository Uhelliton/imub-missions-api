<?php
namespace IGestao\Domains\Auditing\Repositories;

use IGestao\Domains\Auditing\LogAccess;
use IGestao\Domains\Auditing\Repositories\Contracts\LogAccessInterface;
use IGestao\Domains\Auditing\Repositories\Traits\StatisticLogAccessTrait;
use IGestao\Domains\Auditing\Transformers\LogAccessTransformer;
use IGestao\Support\Repository\AbstractRepository;

class LogAccessRepository extends AbstractRepository implements LogAccessInterface
{
    use StatisticLogAccessTrait;

    /*
     * @var  $model, LogAccess
     * @type instace class
     */
    protected $model = LogAccess::class;


    /*
     * @var  $resourceTransformer, LogAccessTransformer
     * @type instace class
     */
    protected $resourceTransformer = LogAccessTransformer::class;

}