<?php
namespace IGestao\Domains\Mission\Team\Transformers;

use IGestao\Domains\Mission\Project\Transformers\ProjectTransformer;
use IGestao\Domains\Mission\Team\Repositories\Contracts\TeamMemberInterface;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamCollectionTransformer extends ResourceCollection
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
                    'name'           => $object->nome,
                    'color'          => $object->cor_hexadecimal,
                    'qtyMembers'     => $this->getQtyMembers($object->id),
                    'leader'         => new MemberTransformer($object->leader),
                    'project'        => new ProjectTransformer($object->project),
                ];
            });
    }


    private function getQtyMembers(int $teamId)
    {
        return app()->make(TeamMemberInterface::class)->count(['equipe_id' => $teamId]);
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
