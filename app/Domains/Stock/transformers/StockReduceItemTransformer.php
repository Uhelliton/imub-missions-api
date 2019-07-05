<?php
namespace IGestao\Domains\Stock\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use IGestao\Domains\Laboratory\Transformers\ProductTransformer;

class StockReduceItemTransformer extends JsonResource
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
               'product'      => new ProductTransformer($this->product),
               'qty'          => $this->qtd
           ];
    }
}
