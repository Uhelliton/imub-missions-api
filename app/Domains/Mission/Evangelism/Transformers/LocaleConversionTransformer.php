<?php
namespace IGestao\Domains\Mission\Evangelism\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class LocaleConversionTransformer extends JsonResource
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
            'name'         => $this->nome,
        ];
    }
}
