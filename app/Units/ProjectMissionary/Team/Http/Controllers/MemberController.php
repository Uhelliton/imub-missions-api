<?php
namespace IGestao\Units\ProjectMissionary\Team\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Mission\Team\Repositories\Contracts\MemberInterface;

class MemberController extends Controller
{
    protected const STATUS_ACTIVE = 1;

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
     * Responsável para listar todos os membros
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function getMembersCollectionSimplified()
    {
        $members =  $this->memberRepository->allMembersWithCollectionSimplified();

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
        $attributes = $this->setAttributes($request);
        $product =  $this->memberRepository->create($attributes);

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
        $attributes = $this->setAttributes($request);
        $product =  $this->memberRepository->update($attributes, $id);

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
        $product =  $this->memberRepository->find($id);

        if ( !$product )
            $this->responseResourceEmpty();

        return $this->response200($product);
    }


    /**
     * @param Request $request
     * @return Array
     */
    protected function setAttributes(Request $request) :Array
    {
        return [
            'nome'            => $request->name,
            'sexo_id'         => $request->genderId,
            'data_nascimento' => $request->birthday,
            'telefone'        => $request->telephone,
            'email'           => $request->email,
            'estado_civil_id' => $request->civilStatusId,
            'status_id'       => self::STATUS_ACTIVE,
        ];
    }

}