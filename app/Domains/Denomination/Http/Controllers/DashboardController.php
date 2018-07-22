<?php

namespace IGestao\Modules\Denomination\Http\Controllers;

use Illuminate\Http\Request;
use Yago\Support\Http\Controllers\Controller;
use Yago\Modules\Dashboard\Repositories\DashboardRepository;


class DashboardController extends Controller
{
    /*
     * @var  $dashboardRepository
     * @type instace class
     */
    protected $dashboardRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param DashboardRepository $dashboardRepository
     */
    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }


    /**
     * Responsavel para exibir a view index
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicesEffective = $this->dashboardRepository->countServicesEffective();

        return view('dashboard::index')->with( compact('servicesEffective') );
    }


    /**
     * Filtragem da quantidade de solicitacoes por departamentos
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterQtySolicitationByDepartements()
    {
        $solicitations = $this->dashboardRepository->countSolicitationByDepartaments();

        return response()->json($solicitations);
    }


}
