<?php
namespace IGestao\Units\BI\Requisition\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Requisition\Repositories\Contracts\RequisitionStatisticInterface;

class RequisitionStatisticController extends Controller
{
    /*
     * @var  $requisitionStatisticRepository
     * @type instace class
     */
    protected $requisitionStatisticRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param RequisitionStatisticInterface $requisitionStatisticRepository
     */
    public function __construct(RequisitionStatisticInterface $requisitionStatisticRepository)
    {
        $this->requisitionStatisticRepository = $requisitionStatisticRepository;
    }


    /**
     * Responsável para listar as ultimas requisições contando por dia
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequisitionLatestCountingPerDay()
    {
        $requisitions =  $this->requisitionStatisticRepository->filterRequisitionLatestCountingPerDay();

        if ( !$requisitions )
            $this->responseResourceEmpty();

        return $this->response200($requisitions);
    }


    /**
     * Responsável para listar requisições por periodos de datas
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequisitionsByPeriodsOfDates(Request $request)
    {
        $dateIn   = $request->get('dateIn');
        $dateOut  = $request->get('dateOut');
        $pointSaleId = $request->get('pointSaleId');

        $requisitions =  $this->requisitionStatisticRepository
                              ->filterRequisitionByPeriodsOfDates($dateIn, $dateOut, $pointSaleId);

        if ( !$requisitions )
            $this->responseResourceEmpty();

        return $this->response200($requisitions);
    }
}