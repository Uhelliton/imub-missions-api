<?php
namespace IGestao\Domains\Mission\Project\Transformers;

use IGestao\Domains\Mission\Locale\Transformers\CityTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectTransformer extends JsonResource
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
            'description'    => $this->descricao,
            'year'           => $this->ano,
            'locale'         => new CityTransformer($this->city),
        ];
    }
}
