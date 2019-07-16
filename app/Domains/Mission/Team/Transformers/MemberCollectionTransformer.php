<?php
namespace IGestao\Domains\Mission\Team\Transformers;

use IGestao\Domains\Membership\Transformers\CivilStatusTransformer;
use IGestao\Domains\Membership\Transformers\GenderTransformer;
use IGestao\Domains\Membership\Transformers\MemberStatusTransformer;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MemberCollectionTransformer extends ResourceCollection
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
                    'gender'         => new GenderTransformer($object->gender),
                    'birthday'       => $object->data_nascimento,
                    'telephone'      => $object->telefone,
                    'email'          => $object->email,
                    'civilStatus'    => new CivilStatusTransformer($object->civilStatus),
                    'status'         => new MemberStatusTransformer($object->status),
                    'createdAt'      => $object->created_at,
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
