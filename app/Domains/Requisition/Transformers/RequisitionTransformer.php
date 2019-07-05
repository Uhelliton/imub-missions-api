<?php
namespace IGestao\Domains\Requisition\Transformers;

use IGestao\Domains\PointSale\Transformers\PointSaleTransformer;
use IGestao\Domains\User\Transformers\UserTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class RequisitionTransformer extends JsonResource
{

    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
           return [
               'id'         => $this->id,
               'date'       => $this->data,
               'requester'  => new UserTransformer($this->user),
               'unit'       => new PointSaleTransformer($this->unit),
               'items'      => RequisitionItemTransformer::collection($this->items),
               'status'     => $this->setStatusRequisition($this)
           ];
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
}
