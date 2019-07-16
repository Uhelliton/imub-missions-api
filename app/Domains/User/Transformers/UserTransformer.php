<?php

namespace IGestao\Domains\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTransformer extends JsonResource
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
            'id'     => $this->id,
            'name'   => $this->nome,
            'email'  => $this->email,
            'thumb'  => $this->foto,
            'role'      => new RoleUserTransformer($this->roleUser)
        ];
    }
}
