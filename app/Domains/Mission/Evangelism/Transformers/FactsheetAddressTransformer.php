<?php
namespace IGestao\Domains\Mission\Evangelism\Transformers;

use IGestao\Domains\Mission\Locale\Transformers\CityTransformer;
use IGestao\Domains\Mission\Locale\Transformers\DistrictTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class FactsheetAddressTransformer extends JsonResource
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
            'street'          => $this->rua,
            'number'          => $this->numero,
            'referencePoint'  => $this->referencia,
            'district'        => new DistrictTransformer($this->district)
        ];
    }
}
