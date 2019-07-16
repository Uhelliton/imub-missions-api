<?php
namespace IGestao\Units\Membership\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Membership\Repositories\Contracts\GenderInterface;

class GenderController extends Controller
{
    /*
     * @var  $genderRepository
     * @type instace class
     */
    protected $genderRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param GenderInterface $genderRepository
     */
    public function __construct(GenderInterface $genderRepository)
    {
        $this->genderRepository = $genderRepository;
    }


    /**
     * Responsável para listar todos os genero
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $members =  $this->genderRepository->all();

        if ( !$members->resource )
            return $this->responseResourceEmpty();

        return $members;
    }



    /**
     * Responsalve para registrar um novo genero
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->genderRepository->create($attributes);

        if ( !$product )
            $this->response500();

        return $this->response201($product);
    }


    /**
     * Responsalve para atualizar um genero
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->genderRepository->update($attributes, $id);

        if ( !$product )
            $this->response500();

        return $this->response200($product);
    }


    /**
     * Responsavel para listar um genero expecifico
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $product =  $this->genderRepository->find($id);

        if ( !$product )
            $this->responseResourceEmpty();

        return $this->response200($product);
    }

}