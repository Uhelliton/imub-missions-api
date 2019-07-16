<?php
namespace IGestao\Units\ProjectMissionary\Locale\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Mission\Locale\Repositories\Contracts\DistrictInterface;

class DistrictController extends Controller
{

    /*
     * @var  $districtRepository
     * @type instace class
     */
    protected $districtRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param DistrictInterface $districtRepository
     */
    public function __construct(DistrictInterface $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }


    /**
     * Responsável para listar os bairros
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $districts =  $this->districtRepository->all();

        if ( !$districts->resource )
            return $this->responseResourceEmpty();

        return $districts;
    }



    /**
     * Responsalve para registrar um novo bairro
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : Object
    {
        $attributes = $this->setAttributes($request);
        $district =  $this->districtRepository->create($attributes);

        if ( !$district )
            $this->response500();

        return $this->response201($district);
    }


    /**
     * Responsalve para atualizar um bairro
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributes = $this->setAttributes($request);
        $district =  $this->districtRepository->update($attributes, $id);

        if ( !$district )
            $this->response500();

        return $this->response200($district);
    }



    /**
     * Responsaável para listar todos os bairros de uma cidade
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistrictByCity(int $id) : Object
    {
        $districts =  $this->districtRepository->findWhere(['cidade_id' => $id]);

        if ( !$districts->resource )
            return $this->responseResourceEmpty();

        return $districts;
    }

    /**
     * Responsavel para listar uma bairro expecifica
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $district =  $this->districtRepository->find($id);

        if ( !$district )
            $this->responseResourceEmpty();

        return $this->response200($district);
    }


    /**
     * @param Request $request
     * @return Array
     */
    protected function setAttributes(Request $request) :Array
    {
        return [
            'nome'            => $request->name,
        ];
    }

}