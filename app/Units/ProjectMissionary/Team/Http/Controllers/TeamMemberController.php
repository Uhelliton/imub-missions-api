<?php
namespace IGestao\Units\ProjectMissionary\Team\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Mission\Team\Repositories\Contracts\TeamMemberInterface;

class TeamMemberController extends Controller
{


    /*
     * @var  $memberRepository
     * @type instace class
     */
    protected $teamMemberRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param TeamMemberInterface $teamMemberRepository
     */
    public function __construct(TeamMemberInterface $teamMemberRepository)
    {
        $this->teamMemberRepository = $teamMemberRepository;
    }


    /**
     * Responsável para listar todas equipes
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $teams =  $this->teamMemberRepository->all();

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
        $this->teamMemberRepository->deleteWhere(['equipe_id' => $request->get('teamId')]);

        $attributes = $this->setAttributes($request);
        $team =  $this->teamMemberRepository->create($attributes);

        if ( !$team )
            $this->response500();

        return $this->response201($team);
    }


    /**
     * Responsavel para listar uma equipe expecifico
     *
     * @param int $teamId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTeamMembers(int $teamId)
    {
        $team =  $this->teamMemberRepository->findWhere(['equipe_id' => $teamId]);

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
        if ($request->get('members')) {
            foreach ($request->get('members') as $memberId) {
                $attributes[] = [
                    'membro_id'   => $memberId,
                    'equipe_id'   => $request->get('teamId'),
                ];
            }
        }
        return $attributes ?? [];
    }


    /**
     * Lista os apenas id dos membros
     *
     * @param Request $request
     * @return Array
     */
    public function getOnlyMemberIds(Request $request) :Array
    {
        foreach ($request->get('members') as $memberId) {
            $memberIds[] = $memberId;
        }

        return $memberIds ?? [];
    }

}