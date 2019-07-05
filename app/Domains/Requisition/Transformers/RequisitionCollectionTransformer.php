<?php
namespace IGestao\Domains\Requisition\Transformers;

use IGestao\Domains\PointSale\Transformers\PointSaleTransformer;
use IGestao\Domains\User\Transformers\UserTransformer;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RequisitionCollectionTransformer extends ResourceCollection
{

    /**
     * Cria uma nova intancia do recurso
     *
     * @param mixed $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }


    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
            $this->resource->map( function ($object){
                return [
                    'id'         => $object->id,
                    'date'       => $object->data,
                    'requester'  => new UserTransformer($object->user),
                    'unit'       => new PointSaleTransformer($object->unit),
                    'items'      => RequisitionItemTransformer::collection($object->items),
                    'status'     => $this->setStatusRequisition($object)
                ];
            });
    }


    /**
     * Seta o status da requisição
     *
     * @param $object
     * @return Array
     */
    private function setStatusRequisition(Object $object) : Array
    {
        $requisitionsPending = $object->items->filter(function ($item, $key) {
            return $item['atendido'] < $item['qtd'];
        });

        if (count($requisitionsPending) === 0)
            return $status = ['id' => 1, 'name' => 'Liquidada'];

        elseif (count($requisitionsPending) > 0) {
            $filtered = $object->items->filter(function ($item, $key) {
                return $item['atendido'] > 0;
            });
            if (count($filtered) === 0) return $status = ['id' => 2, 'name' => 'Pendente'];
            else return $status = ['id' => 3, 'name' => 'Parcialmente Baixada'];
        }

        return $status;
    }

    /**
     * Obtenha dados adicionais que devem ser retornados com a matriz de recursos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'success'  => true,
        ];
    }
}
