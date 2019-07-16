<?php
namespace IGestao\Domains\Mission\Evangelism\Transformers;

use IGestao\Domains\Membership\Transformers\GenderTransformer;
use IGestao\Domains\Mission\Project\Transformers\ProjectTransformer;
use IGestao\Domains\Mission\Team\Transformers\TeamOnlyTransformer;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FactsheetCollectionTransformer extends ResourceCollection
{
    /**
     * Cria uma nova intancia do recurso
     *
     * @param mixed $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }


    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
            $this->resource->map( function ($object) {
                return [
                    'id'             => $object->id,
                    'cod'            => $object->codigo,
                    'name'           => $object->nome,
                    'age'            => $object->idade,
                    'telephone'      => $object->telefone,
                    'gender'         => new GenderTransformer($object->gender),
                    'hasCourse'          => (bool) $object->curso,
                    'hasTakingDecision'  => (bool) $object->conversao,
                    'hasCell'            => (bool) $object->celula,
                    'team'               => new TeamOnlyTransformer($object->team),
                    'project'            => new ProjectTransformer($object->project),
                    'address'            => new FactsheetAddressTransformer($object->address),
                    'evangelismMembers'  => $object->membro_evangelismo,
                    'quantityCompanion'  => $object->qtd_acompanhante,
                    'observation'        => $object->observacao,
                    'evangelismDate'     => $object->data_evangelismo,
                ];
            });
    }


    /**
     * Obtenha dados adicionais que devem ser retornados com a matriz de recursos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'success'  => true,
        ];
    }
}
