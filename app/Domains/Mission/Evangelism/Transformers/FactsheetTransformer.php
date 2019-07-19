<?php
namespace IGestao\Domains\Mission\Evangelism\Transformers;

use IGestao\Domains\Membership\Transformers\GenderTransformer;
use IGestao\Domains\Mission\Project\Transformers\ProjectTransformer;
use IGestao\Domains\Mission\Team\Transformers\TeamOnlyTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class FactsheetTransformer extends JsonResource
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
            'cod'            => $this->codigo,
            'name'           => $this->nome,
            'age'            => $this->idade,
            'telephone'      => $this->telefone,
            'gender'         => new GenderTransformer($this->gender),
            'hasCourse'          => (bool) $this->curso,
            'hasTakingDecision'  => (bool) $this->conversao,
            'hasCell'            => (bool) $this->celula,
            'conversion'         => new ConversionTransformer($this->conversion),
            'team'               => new TeamOnlyTransformer($this->team),
            'project'            => new ProjectTransformer($this->project),
            'address'            => new FactsheetAddressTransformer($this->address),
            'evangelismMembers'  => $this->membro_evangelismo,
            'quantityCompanion'  => $this->qtd_acompanhante,
            'observation'        => $this->observacao,
            'evangelismDate'     => $this->data_evangelismo,
        ];
    }
}
