<?php
namespace IGestao\Domains\Requisition\Repositories\Contracts;

interface RequisitionStatisticInterface
{

    /**
     * Responsável para filtrar as ultimas requisições contando por dia
     *
     * @return array
     */
    public function filterRequisitionLatestCountingPerDay();


    /**
     * Responsável para filtrar requisições po periodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param int pointSaleId
     * @return array
     */
    public function filterRequisitionByPeriodsOfDates(string $dateIn, string $dateOut, ?int $pointSaleId);
}
