<?php
namespace IGestao\Domains\Mission\Evangelism\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ConversionTransformer extends JsonResource
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
            'locale'         => [
                'id'   => $this->local_id,
                'name' => '',
            ],
            'decisionDate'   => $this->data_decisao,
        ];
    }
}
