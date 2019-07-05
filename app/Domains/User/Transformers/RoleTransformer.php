<?php

namespace IGestao\Domains\User\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleTransformer extends JsonResource
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
            'slug'   => $this->slug,
            'name'   => $this->nome,
            'permissions'  => json_decode($this->permissoes),
        ];
    }
}
