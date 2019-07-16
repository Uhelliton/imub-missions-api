<?php
namespace IGestao\Units\Membership\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Membership\Repositories\Contracts\CivilStatusInterface;

class CivilStatusController extends Controller
{
    /*
     * @var  $civilStatusRepository
     * @type instace class
     */
    protected $civilStatusRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param CivilStatusInterface $civilStatusRepository
     */
    public function __construct(CivilStatusInterface $civilStatusRepository)
    {
        $this->civilStatusRepository = $civilStatusRepository;
    }


    /**
     * Responsável para listar todos os estados civil
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $members =  $this->civilStatusRepository->all();

        if ( !$members->resource )
            return $this->responseResourceEmpty();

        return $members;
    }



    /**
     * Responsalve para registrar um novo estado civil
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->civilStatusRepository->create($attributes);

        if ( !$product )
            $this->response500();

        return $this->response201($product);
    }


    /**
     * Responsalve para atualizar um estado civil
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->civilStatusRepository->update($attributes, $id);

        if ( !$product )
            $this->response500();

        return $this->response200($product);
    }


    /**
     * Responsavel para listar um estado civil expecifico
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $product =  $this->civilStatusRepository->find($id);

        if ( !$product )
            $this->responseResourceEmpty();

        return $this->response200($product);
    }

}