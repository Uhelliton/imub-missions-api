<?php
namespace IGestao\Domains\User\Repositories;

use IGestao\Domains\User\User;
use IGestao\Domains\User\Repositories\Contracts\UserInterface;
use IGestao\Domains\User\Transformers\UserTransformer;
use IGestao\Domains\User\Transformers\UserCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class UserRepository extends AbstractRepository implements UserInterface
{
    /*
     * @var  $model, User
     * @type instace class
     */
    protected $model = User::class;

    /*
     * @var  $resourceTransformer, UserTransformer
     * @type instace class
     */
    protected $resourceTransformer = UserTransformer::class;

    /*
     * @var  $collectionTransformer, UserCollectionTransformer
     * @type instace class
     */
    protected $collectionTransformer = UserCollectionTransformer::class;


    /**
     * Método que faz a inserção de dados em uma tabela com relacionamento
     *
     * @param array $attributesUser
     * @param array $attributesRole
     * @param array $attributesPointSale
     * @return mixed
     */
    public function createWithRalationship(array $attributesUser, array $attributesRole, array $attributesPointSale)
    {
        $model = $this->model->create($attributesUser);
        $model = $this->model->find($model->id);
        $model->roleUser()->create($attributesRole);
        $model->pointSaleUser()->createMany($attributesPointSale);

        return $this->resourceTransformer::make($model);
    }

}