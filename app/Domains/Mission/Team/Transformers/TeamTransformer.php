<?php
namespace IGestao\Domains\Mission\Team\Transformers;

use IGestao\Domains\Mission\Project\Transformers\ProjectTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamTransformer extends JsonResource
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
            'color'          => $this->cor_hexadecimal,
            'leader'         => new MemberTransformer($this->leader),
            'project'        => new ProjectTransformer($this->project),
        ];
    }
}
