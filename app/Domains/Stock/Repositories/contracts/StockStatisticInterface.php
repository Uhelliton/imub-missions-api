<?php
namespace IGestao\Domains\Stock\Repositories\Contracts;

interface StockStatisticInterface
{

    /**
     * Responsável para filtrar saidas de produtos periodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param int $pointSaleId
     * @return array
     */
    public function filterProductsOutuptsByPeriodsOfDates(string $dateIn, string $dateOut, ?int $pointSaleId);


    /**
     * Responsável para filtrar entradas de produtos periodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param int $reasonId
     * @return array
     */
    public function filterProductsEntriesByPeriodsOfDates(string $dateIn, string $dateOut, ?int $reasonId);


    /**
     * Responsável para filtrar o estoque por períodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param array $sectorIds
     * @return array
     */
    public function filterStockByPeriodsOfDates(string $dateIn, string $dateOut, array $sectorIds);
}
