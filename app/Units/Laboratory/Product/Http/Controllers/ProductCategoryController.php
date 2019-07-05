<?php
namespace IGestao\Units\Laboratory\Product\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductCategoryInterface;

class ProductCategoryController extends Controller
{
    /*
     * @var  $poductCategoryRepository
     * @type instace class
     */
    protected $productCategoryRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param ProductCategoryInterface $productCategoryRepository
     */
    public function __construct(ProductCategoryInterface $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }


    /**
     * Responsável para listar todas as categorias
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $products =  $this->productCategoryRepository->all();

        if ( array_is_empty($products->resource) )
            $this->responseResourceEmpty();

        return $products;
    }



    /**
     * Responsalve para registrar um nova categoria
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->productCategoryRepository->create($attributes);

        if ( !$product )
            $this->response500();

        return $this->response201($product);
    }


    /**
     * Responsalve para atualizar um categoria
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->productCategoryRepository->update($attributes, $id);

        if ( !$product )
            $this->response500();

        return $this->response200($product);
    }


    /**
     * Responsavel para listar um categoria expecifica
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $product =  $this->productCategoryRepository->find($id);

        if ( !$product )
            $this->responseResourceEmpty();

        return $this->response200($product);
    }

    /**
     * @param Request $request
     * @return Array
     */
    private function setAttribues(Request $request) : Array
    {
        $attributes = [
            'nome'     => $request->get('name'),
            'setor_id' => $request->get('sectorId'),
        ];
        return $attributes;
    }

}