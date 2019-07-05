<?php

namespace IGestao\Domains\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleUserTransformer extends JsonResource
{
    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function toArray($request)
    {
        return new RoleTransformer($this->role);
    }
}
