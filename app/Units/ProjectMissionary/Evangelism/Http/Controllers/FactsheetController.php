<?php
namespace IGestao\Units\ProjectMissionary\Evangelism\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Mission\Evangelism\Repositories\Contracts\FactsheetInterface;
use Illuminate\Database\DatabaseManager;

class FactsheetController extends Controller
{

    /*
     * @var  $factsheetRepository
     * @type instace class
     */
    protected $factsheetRepository;


    /*
     * @var  $dbManager
     * @type instace class
     */
    protected $dbManager;


    /**
     * Injeta as dependencias da classe
     *
     * @param FactsheetInterface $factsheetRepository
     * @param DatabaseManager $dbManager
     */
    public function __construct(FactsheetInterface $factsheetRepository, DatabaseManager $dbManager)
    {
        $this->factsheetRepository = $factsheetRepository;
        $this->dbManager = $dbManager;
    }


    /**
     * Responsável para listar as fichas de inscrições
     *
     * @return \IGestao\Support\Contracts\Repositories\Collection
     */
    public function index()
    {
        $factsheets =  $this->factsheetRepository->all();

        if ( !$factsheets->resource )
            return $this->responseResourceEmpty();

        return $factsheets;
    }


    /**
     * Responsalve para registrar uma nova ficha de inscrição
     *
     * @param Request $request
     * @return Object
     * @throws \Exception
     */
    public function store(Request $request) : Object
    {
        $this->dbManager->beginTransaction();
        try {
            $attributesFactsheet = $this->setAttributesFactsheet($request);
            $attributesFactsheetaddress = $this->setAttributesFactsheetAddress($request);
            $factsheet =  $this->factsheetRepository->createWithRalationship($attributesFactsheet, $attributesFactsheetaddress);

            $this->dbManager->commit();
            return $this->response201($factsheet);
        }
        catch (Exception $exception) {
            $this->dbManager->rollBack();
            $errorMessage = [
                'message' => $exception->getMessage(),
                'line'    => $exception->getLine()
            ];
            $this->response500($errorMessage);
        }
    }


    /**
     * Responsalve para atualizar uma ficha de inscrição
     *
     * @param  Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id) : Object
    {
        $attributesFactsheet = $this->setAttributesFactsheet($request);
        $attributesFactsheetaddress = $this->setAttributesFactsheetAddress($request);
        $factsheet =  $this->factsheetRepository->updateWithRalationship($id, $attributesFactsheet, $attributesFactsheetaddress);

        if ( !$factsheet )
            $this->response500();

        return $this->response200($factsheet);
    }


    /**
     * Responsavel para listar uma ficha de inscrição expecifica
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $factsheet =  $this->factsheetRepository->find($id);

        if ( !$factsheet )
            $this->responseResourceEmpty();

        return $this->response200($factsheet);
    }


    /**
     * @param Request $request
     * @return Array
     */
    protected function setAttributesFactsheet(Request $request) :Array
    {
        return [
            'codigo'          => $request->get('cod'),
            'nome'            => $request->get('name'),
            'idade'           => ($request->get('age') != 0) ? $request->get('age') : null,
            'telefone'        => $request->get('telephone'),
            'sexo_id'         => $request->get('genderId'),
            'curso'           => (bool) $request->get('hasCourse'),
            'conversao'       => (bool) $request->get('hasTakingDecision'),
            'celula'          => (bool) $request->get('hasCell'),
            'projeto_id'           => $request->get('projectId'),
            'equipe_id'            => $request->get('teamId'),
            'membro_evangelismo'   => implode(', ', $request->get('evangelismMembers')),
            'qtd_acompanhante'     => ($request->get('quantityCompanion') != 0) ? $request->get('quantityCompanion') : null,
            'observacao'           => $request->get('observation'),
            'data_evangelismo'     => $request->get('evangelismDate'),
        ];
    }

    /**
     * @param Request $request
     * @return Array
     */
    protected function setAttributesFactsheetAddress(Request $request) :Array
    {
        return [
            'rua'          => $request->get('address')['street'],
            'numero'       => $request->get('address')['number'],
            'referencia'   => $request->get('address')['referencyPoint'],
            'bairro_id'    => $request->get('address')['districtId'],
            'cidade_id'    => $request->get('address')['cityId'],
        ];
    }

}