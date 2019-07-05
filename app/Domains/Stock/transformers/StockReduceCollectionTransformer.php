<?php
namespace IGestao\Domains\Stock\Transformers;

use IGestao\Domains\User\Transformers\UserTransformer;
use Illuminate\Http\Resources\Json\ResourceCollection;
use IGestao\Domains\Laboratory\Transformers\ProductTransformer;

class StockReduceCollectionTransformer extends ResourceCollection
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
                    'id'          => $object->id,
                    'operationId' => $object->codigo_operacao,
                    'product'     => new ProductTransformer($object->product),
                    'qty'         => $object->qtd,
                    'reason'      => new ReasonReduceTransformer($object->reason),
                    'user'        => new UserTransformer($object->user),
                    'observation' => $object->observacao,
                    'createdAt'   => (string) $object->created_at
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
