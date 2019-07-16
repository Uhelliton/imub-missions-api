<?php
namespace IGestao\Domains\Mission\Team\Transformers;

use IGestao\Domains\Membership\Transformers\CivilStatusTransformer;
use IGestao\Domains\Membership\Transformers\GenderTransformer;
use IGestao\Domains\Membership\Transformers\MemberStatusTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberTransformer extends JsonResource
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
            'gender'         => new GenderTransformer($this->gender),
            'birthday'       => $this->data_nascimento,
            'telephone'      => $this->telefone,
            'email'          => $this->email,
            'civilStatus'    => new CivilStatusTransformer($this->civilStatus),
            'status'         => new MemberStatusTransformer($this->status),
            'createdAt'      => $this->created_at,
        ];
    }
}
