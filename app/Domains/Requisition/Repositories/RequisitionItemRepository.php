<?php
namespace IGestao\Domains\Requisition\Repositories;

use IGestao\Domains\Requisition\RequisitionItem;
use IGestao\Domains\Requisition\Repositories\Contracts\RequisitionItemInterface;
use IGestao\Domains\Requisition\Transformers\RequisitionItemTransformer;
use IGestao\Domains\Requisition\Transformers\RequisitionCollectionTransformer;
use IGestao\Support\Repository\AbstractRepository;

class RequisitionItemRepository extends AbstractRepository implements RequisitionItemInterface
{

    /*
     * @var  $model, RequisitionItem
     * @type instace class
     */
    protected $model = RequisitionItem::class;


    /*
     * @var  $resourceTransformer, RequisitionItemTransformer
     * @type instace class
     */
    protected $resourceTransformer = RequisitionItemTransformer::class;


    /*
    * @var  $collectionTransformer, RequisitionCollectionTransformer
    * @type instace class
    */
    protected $collectionTransformer = RequisitionCollectionTransformer::class;


    /**
     * Método resposável para atualizar dados em massa
     *
     * @param string $field
     * @param array $id
     * @param array $attibutes
     * @return mixed
     */
    public function updateWhereIn(string $field, array $id, array $attibutes = array())
    {
        $model =
            $this->model
                 ->whereIn($field, $id)
                 ->update($attibutes);

        return $model;
    }

}