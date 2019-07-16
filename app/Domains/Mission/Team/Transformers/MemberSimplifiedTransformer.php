<?php
namespace IGestao\Domains\Mission\Team\Transformers;

use IGestao\Domains\Membership\Transformers\CivilStatusTransformer;
use IGestao\Domains\Membership\Transformers\GenderTransformer;
use IGestao\Domains\Membership\Transformers\MemberStatusTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberSimplifiedTransformer extends JsonResource
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
            'telephone'      => $this->telefone,
            'email'          => $this->email,
        ];
    }
}
