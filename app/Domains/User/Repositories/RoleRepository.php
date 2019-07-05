<?php
namespace IGestao\Domains\User\Repositories;

use IGestao\Domains\User\Role;
use IGestao\Domains\User\Repositories\Contracts\RoleInterface;
use IGestao\Domains\User\Transformers\RoleTransformer;
use IGestao\Domains\User\Transformers\RoleCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class RoleRepository extends AbstractRepository implements RoleInterface
{
    /*
     * @var  $model, Role
     * @type instace class
     */
    protected $model = Role::class;

    /*
     * @var  $resourceTransformer, RoleTransformer
     * @type instace class
     */
    protected $resourceTransformer = RoleTransformer::class;

    /*
     * @var  $collectionTransformer, RoleTransformer
     * @type instace class
     */
    protected $collectionTransformer = RoleCollectionTransformer::class;

}