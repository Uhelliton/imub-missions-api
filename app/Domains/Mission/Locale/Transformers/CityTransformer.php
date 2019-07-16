<?php
namespace IGestao\Domains\Mission\Locale\Transformers;
use IGestao\Domains\Mission\Locale\District;
use Illuminate\Http\Resources\Json\JsonResource;

class   CityTransformer extends JsonResource
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
            'id'             => $this->id,
            'name'           => $this->nome,
        ];
    }
}
