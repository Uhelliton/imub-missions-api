<?php
namespace IGestao\Domains\Stock\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ReasonReduceTransformer extends JsonResource
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
            'name'       => $this->nome,
        ];
    }
}
