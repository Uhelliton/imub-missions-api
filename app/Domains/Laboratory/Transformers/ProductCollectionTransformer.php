<?php
namespace IGestao\Domains\Laboratory\Transformers;

use IGestao\Domains\Stock\Transformers\StockWithoutProductTransformer;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollectionTransformer extends ResourceCollection
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
                    'id'           => $object->id,
                    'code'         => $object->codigo,
                    'name'         => $object->nome,
                    'weight'       => $object->peso,
                    'portion'      => $object->descricao_porcao,
                    'cover'        => $object->foto,
                    'category'     => new ProductCategoryTransformer($object->category),
                    'status'       => new ProductStatusTransformer($object->status),
                    'unitMeasure'  => new ProductUnitMeasureTransformer($object->unitMeasure),
                    'forecastDate' => $object->data_previsao,
                    'minimumStock' => $object->estoque_minimo,
                    'hasAvailable' => ($object->status_id === 1),
                    'hasMinimumStock' => ( $object->estoque_minimo != null ),
                    'stock'           => new StockWithoutProductTransformer($object->stock)
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
