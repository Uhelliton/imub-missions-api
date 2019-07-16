<?php
namespace IGestao\Domains\Mission\Team\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TeamMemberCollectionTransformer extends ResourceCollection
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
        $members = $this->resource->map( function ($object) {
            return  New MemberSimplifiedTransformer($object->member);
         });

        $resource = json_parse($this->resource);
        $team = ($resource->data) ? new TeamTransformer($this->resource[0]->team) : null;
        $team = json_parse($team);

        if (!empty($team)) {
            return  [
                'id'       => $team->id,
                'name'     => $team->name,
                'color'    => $team->color,
                'leader'   => [
                    'id'   => $team->leader->id,
                    'name' => $team->leader->name,
                    'gender'    => [
                        'id'    => $team->leader->gender->id,
                        'name'  => $team->leader->gender->name
                    ],
                    'birthday'  => $team->leader->birthday,
                    'telephone' => $team->leader->telephone,
                    'email'     => $team->leader->email,
                    'civilStatus' => [
                        'id'      =>  $team->leader->civilStatus->id,
                        'name'    => $team->leader->civilStatus->name
                    ]
                ],
                'project'  => [
                    'id'          => $team->project->id,
                    'name'        => $team->project->name,
                    'description' => $team->project->description,
                    'year'        => $team->project->year,
                    'locale'      => [
                       'city' => [
                           'id'      => $team->project->locale->id,
                           'name'    => $team->project->locale->name
                       ]
                    ]
                ],
                'members' => $members
            ];
        }
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
