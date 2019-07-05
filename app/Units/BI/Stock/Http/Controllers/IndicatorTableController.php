<?php
namespace IGestao\Units\BI\Stock\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Stock\Repositories\Contracts\IndicatorTableInterface;

class IndicatorTableController extends Controller
{
    /*
     * @var  $indicatorTableRepository
     * @type instace class
     */
    protected $indicatorTableRepository;


    /**
     * Injeta as dependencias da classe
     *
     * @param IndicatorTableInterface $indicatorTableRepository
     */
    public function __construct(IndicatorTableInterface $indicatorTableRepository)
    {
        $this->indicatorTableRepository = $indicatorTableRepository;
    }


    /**
     * Responsável para listar a contagem de postagem por tabela
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPostingsByTable()
    {
        $indicators =  $this->indicatorTableRepository->countPostingsByTable();

        if ( !$indicators )
            $this->responseResourceEmpty();

        return $this->response200($indicators);
    }
}