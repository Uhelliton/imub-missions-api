<?php
namespace IGestao\Units\BI\Product\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductStatisticInterface;

class ProductStatisticController extends Controller
{
    /*
     * @var  $productStatisticRepository
     * @type instace class
     */
    protected $productStatisticRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param ProductStatisticInterface $productStatisticRepository
     */
    public function __construct(ProductStatisticInterface $productStatisticRepository)
    {
        $this->productStatisticRepository = $productStatisticRepository;
    }


    /**
     * Responsável para listar  os produtos com maior saida
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsWithGreaterOutput()
    {
        $products =  $this->productStatisticRepository->filterProductsWithGreaterOutput();

        if ( !$products )
            $this->responseResourceEmpty();

        return $this->response200($products);
    }
}