<?php
namespace IGestao\Domains\Membership\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CivilStatusTransformer extends JsonResource
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
            'id'   => $this->id,
            'name' => $this->nome
        ];
    }
}
