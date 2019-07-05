<?php
namespace IGestao\Units\BI\Stock\Http\Controllers;

use Illuminate\Http\Request;
use IGestao\Support\Http\Controllers\Controller;
use IGestao\Domains\Stock\Repositories\Contracts\StockStatisticInterface;

class StockStatisticsController extends Controller
{
    /*
     * @var  $stockStatisticRepository
     * @type instace class
     */
    protected $stockStatisticRepository;

    /**
     * tipos: entrada e saida de produtos
     * @var int
     */
    private static $typeEntry  = 1;
    private static $typeOutput = 2;


    /**
     * Injeta as dependencias da classe
     *
     * @param StockStatisticInterface $stockStatistic
     */
    public function __construct(StockStatisticInterface $stockStatistic)
    {
        $this->stockStatisticRepository = $stockStatistic;
    }


    /**
     * Responsável para filtrar as saidas de produtos por periodos de datas
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsEntriesOutuptsByPeriodsOfDates(Request $request)
    {
        $dateIn  = $request->get('dateIn');
        $dateOut = $request->get('dateOut');

        if ((int) $request->get('reportType') === self::$typeEntry) {
            $reasonId = $request->get('reasonEntryId');
            $filtered = $this->stockStatisticRepository->filterProductsEntriesByPeriodsOfDates($dateIn, $dateOut, $reasonId);
        }

        if ((int) $request->get('reportType') === self::$typeOutput) {
            $pointSale = $request->get('pointSaleId');
            $filtered = $this->stockStatisticRepository->filterProductsOutuptsByPeriodsOfDates($dateIn, $dateOut, $pointSale);
        }

        return $this->response200($filtered ?? []);
    }


    /**
     * Responsável para o inventário de estoque po periodos de datas
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStockInventoryByPeriodsOfDates(Request $request)
    {
        $dateIn  = $request->get('dateIn');
        $dateOut = $request->get('dateOut');

        $sectorIds = $request->get('sectorIds');
        $filtered  = $this->stockStatisticRepository->filterStockByPeriodsOfDates($dateIn, $dateOut, $sectorIds);

        return $this->response200($filtered);
    }

}