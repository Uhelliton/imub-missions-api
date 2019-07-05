<?php

namespace IGestao\Domains\User\Transformers;

use IGestao\Domains\Laboratory\Transformers\SectorTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class SectorUserTransformer extends JsonResource
{
    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function toArray($request)
    {
        return new SectorTransformer($this->sector);
    }
}
