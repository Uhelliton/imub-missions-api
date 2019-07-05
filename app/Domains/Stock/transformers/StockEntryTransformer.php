<?php
namespace IGestao\Domains\Stock\Transformers;

use IGestao\Domains\User\Transformers\UserTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class StockEntryTransformer extends JsonResource
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
               'items'        => StockEntryItemTransformer::collection($this->items),
               'reason'       => new ReasonEntryTransformer($this->reason),
               'user'         => new UserTransformer($this->user),
               'observation'  => $this->observacao,
               'createdAt'    => (string) $this->created_at
           ];
    }
}
