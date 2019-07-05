<?php
namespace IGestao\Units\Laboratory\Sector\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Laboratory\Repositories\Contracts\SectorInterface;

class SectorController extends Controller
{
    /*
     * @var  $sectortRepository
     * @type instace class
     */
    protected $sectortRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param SectorInterface $sectorRepository
     */
    public function __construct(SectorInterface $sectorRepository)
    {
        $this->sectortRepository = $sectorRepository;
    }


    /**
     * Responsável para listar todas os setores
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index() : Object
    {
        $sectors =  $this->sectortRepository->all();

        if ( array_is_empty($sectors->resource) )
            $this->response404();

        return $sectors;
    }


    /**
     * Responsável para registrar um novo setor
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : Object
    {
        $attributes = $this->setAttribues($request);
        $sector =  $this->sectortRepository->create($attributes);

        if ( !$sector )
            $this->response500();

        return $this->response201($sector);
    }


    /**
     * Responsalve para atualizar um setor
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributes = $this->setAttribues($request);
        $sector =  $this->sectortRepository->update($attributes, $id);

        if ( !$sector )
            $this->response500();

        return $this->response200($sector);
    }


    /**
     * Responsavel para listar um setor expecífico
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id) : Object
    {
        $sector =  $this->sectortRepository->find($id);

        if ( !$sector )
            $this->responseResourceEmpty();

        return $this->response200($sector);
    }



    /**
     * @param Request $request
     * @return Array
     */
    private function setAttribues(Request $request) : Array
    {
        $attributes = [
            'nome'      => $request->get('name'),
            'descricao' => $request->get('description'),
        ];
        return $attributes;
    }

}