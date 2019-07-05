<?php
namespace IGestao\Domains\Laboratory\Transformers;

use IGestao\Domains\Stock\Transformers\StockWithoutProductTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductTransformer extends JsonResource
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
            'id'          => $this->id,
            'code'        => $this->codigo,
            'name'        => $this->nome,
            'weight'      => $this->peso,
            'portion'     => $this->descricao_porcao,
            'cover'       => $this->foto,
            'category'    => new ProductCategoryTransformer($this->category),
            'status'      => new ProductStatusTransformer($this->status),
            'unitMeasure'  => new ProductUnitMeasureTransformer($this->unitMeasure),
            'forecastDate' => $this->data_previsao,
            'minimumStock' => $this->estoque_minimo,
            'hasAvailable'    => ($this->status_id === 1),
            'hasMinimumStock' => ($this->estoque_minimo != null),
            'stock'           => new StockWithoutProductTransformer($this->stock)
        ];
    }
}
