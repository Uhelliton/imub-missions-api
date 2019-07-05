<?php
namespace IGestao\Domains\Stock\Transformers;

use IGestao\Domains\User\Transformers\UserTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class StockReduceTransformer extends JsonResource
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
               'id'           => $this->id,
               'items'        => StockReduceItemTransformer::collection($this->items),
               'reason'       => new ReasonReduceTransformer($this->reason),
               'user'         => new UserTransformer($this->user),
               'observation'  => $this->observacao,
               'createdAt'    => (string) $this->created_at
           ];
    }
}
