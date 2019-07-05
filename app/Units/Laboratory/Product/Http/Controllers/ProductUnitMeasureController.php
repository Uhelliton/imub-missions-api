<?php
namespace IGestao\Units\Laboratory\Product\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductUnitMeasureInterface;

class ProductUnitMeasureController extends Controller
{
    /*
     * @var  $productMeasureRepository
     * @type instace class
     */
    protected $productUnitMeasureRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param ProductUnitMeasureInterface $productUnitMeasureRepository
     */
    public function __construct(ProductUnitMeasureInterface $productUnitMeasureRepository)
    {
        $this->productUnitMeasureRepository = $productUnitMeasureRepository;
    }


    /**
     * Responsável para listar todas as unidades de medidas
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $measures =  $this->productUnitMeasureRepository->all();

        if ( array_is_empty($measures->resource) )
            $this->responseResourceEmpty();

        return $measures;
    }


}