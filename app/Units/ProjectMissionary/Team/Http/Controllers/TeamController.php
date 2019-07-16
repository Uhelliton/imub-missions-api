<?php
namespace IGestao\Units\ProjectMissionary\Team\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Mission\Team\Repositories\Contracts\TeamInterface;

class TeamController extends Controller
{


    /*
     * @var  $memberRepository
     * @type instace class
     */
    protected $teamRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param TeamInterface $teamRepository
     */
    public function __construct(TeamInterface $teamRepository)
    {
        $this->teamRepository = $teamRepository;
    }


    /**
     * Responsável para listar todas equipes
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $teams =  $this->teamRepository->all();

        if ( !$teams->resource )
            return $this->responseResourceEmpty();

        return $teams;
    }



    /**
     * Responsalve para registrar uma nova equipe
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) : Object
    {
        $attributes = $this->setAttributes($request);
        $team =  $this->teamRepository->create($attributes);

        if ( !$team )
            $this->response500();

        return $this->response201($team);
    }


    /**
     * Responsalve para atualizar uma equipe
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributes = $this->setAttributes($request);
        $team =  $this->teamRepository->update($attributes, $id);

        if ( !$team )
            $this->response500();

        return $this->response200($team);
    }


    /**
     * Responsavel para listar uma equipe expecifico
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $team =  $this->teamRepository->find($id);

        if ( !$team )
            $this->responseResourceEmpty();

        return $this->response200($team);
    }


    /**
     * @param Request $request
     * @return Array
     */
    protected function setAttributes(Request $request) :Array
    {
        return [
            'nome'             => $request->name,
            'cor_hexadecimal'  => $request->color,
            'projeto_id'       => $request->projectId,
            'lider_id'         => $request->leaderId,

        ];
    }

}