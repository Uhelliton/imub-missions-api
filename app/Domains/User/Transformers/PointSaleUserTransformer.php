<?php

namespace IGestao\Domains\User\Transformers;

use IGestao\Domains\PointSale\Transformers\PointSaleTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class PointSaleUserTransformer extends JsonResource
{
    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function toArray($request)
    {
        return new PointSaleTransformer($this->pointSale);
    }
}
