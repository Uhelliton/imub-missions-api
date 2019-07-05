<?php
namespace IGestao\Units\Laboratory\Product\Http\Controllers;

use IGestao\Units\Laboratory\Product\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductInterface;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /*
     * @var  $productRepository
     * @type instace class
     */
    protected $productRepository;

    /**
     * @const
     * @type status produtos
     */
    protected const STATUS_AVAILABLE = 1;


    /**
     * Injeta as dependencias da classe
     *
     * @param ProductInterface $productRepository
     */
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }


    /**
     * Responsável para listar todos os produtos
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $products =  $this->productRepository->all();

        if ( array_is_empty($products->resource) )
            $this->response404();

        return $products;
    }



    /**
     * Responsalve para registrar um novo produto
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   ProductRequest $productRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, ProductRequest $productRequest) : Object
    {
        $attributes = $this->setAttribues($request); 
        $product =  $this->productRepository->create($attributes);

        if ( !$product )
            $this->response500();

        return $this->response201($product);
    }


    /**
     * Responsalve para atualizar um produto
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->productRepository->update($attributes, $id);

        if ( !$product )
            $this->response500();

        return $this->response200($product);
    }


    /**
     * Responsavel para listar um produto expecifico
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $product =  $this->productRepository->find($id);

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
            'nome'               => $request->get('name'),
            'codigo'             => $request->get('code'),
            'peso'               => $request->get('weight'),
            'descricao_porcao'   => $request->get('description'),
            'categoria_id'       => $request->get('categoryId'),
            'status_id'          => $request->get('statusId') ?? self::STATUS_AVAILABLE,
            'unidade_medida_id'  => $request->get('unitMeasureId'),
            'estoque_minimo'     => $request->get('minimumStock') ?? null,
        ];

        if ( !empty($request->get('cover')) )
            $attributes = Arr::add($attributes, 'foto', $request->get('cover'));

        if ((int) $request->get('statusId') === self::STATUS_AVAILABLE)
             $attributes = Arr::add($attributes, 'data_previsao', null);
        else $attributes = Arr::add($attributes, 'data_previsao', $request->get('forecastDate'));

        return $attributes;
    }

    /**
     * Responsavel para validar as entradas dos inputs
     *
     * @param Request $request
     * @return array
     */
    public function validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'           => 'required',
            'value'           => 'required',
            'establishmentId' => 'required',
            'categoryId'      => 'required'
        ]);

        return $validator;
    }

}