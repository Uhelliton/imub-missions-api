<?php
namespace IGestao\Domains\Stock\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class StockWithoutProductTransformer extends JsonResource
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
               'id'       => $this->id,
               'qty'      => $this->qtd
           ];
    }
}
