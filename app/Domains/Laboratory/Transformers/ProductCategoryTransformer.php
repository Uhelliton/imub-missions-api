<?php
namespace IGestao\Domains\Laboratory\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryTransformer extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->nome,
            'sector'      => new SectorOnlyTransformer($this->sector)
        ];
    }
}
