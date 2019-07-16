<?php
namespace IGestao\Units\Membership\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Mission\Team\Repositories\Contracts\MemberInterface;

class MemberController extends Controller
{
    /*
     * @var  $memberRepository
     * @type instace class
     */
    protected $memberRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param MemberInterface $memberRepository
     */
    public function __construct(MemberInterface $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }


    /**
     * Responsável para listar todos os membros
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $members =  $this->memberRepository->all();

        if ( !$members->resource )
            return $this->responseResourceEmpty();

        return $members;
    }


    /**
     * Responsalve para registrar um novo membro
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : Object
    {
        $attributes = $this->setAttribues($request);
        $product =  $this->productRepository->create($attributes);

        if ( !$product )
            $this->response500();

        return $this->response201($product);
    }


    /**
     * Responsalve para atualizar um membro
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
     * Responsavel para listar um membro expecifico
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

}