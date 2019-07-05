<?php
namespace IGestao\Domains\Requisition\Repositories;

use IGestao\Support\Repository\AbstractQueryBuilderRepository;
use IGestao\Domains\Requisition\Repositories\Contracts\RequisitionStatisticInterface;

class RequsitionStatisticRepository extends AbstractQueryBuilderRepository implements RequisitionStatisticInterface
{

    /**
     * Responsável para filtrar as ultimas requisições contando por dia
     *
     * @return array
     */
    public function filterRequisitionLatestCountingPerDay()
    {
        $collection =
            $this->db
                ->select("
                    SELECT 
                        DATE(data) AS date, COUNT(*) AS total
                    FROM
                        lab_requisicao
                    GROUP BY DATE(data)
                    ORDER BY date ASC
                    LIMIT 15
                  ");
        return $collection;
    }


    /**
     * Responsável para filtrar requisições por periodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param int pointSaleId
     * @return array
     */
    public function filterRequisitionByPeriodsOfDates(string $dateIn, string $dateOut, ?int $pointSaleId)
    {
        $queryInject = ($pointSaleId) ? "AND re.ponto_venda_id = {$pointSaleId}" : '';
        $collection =
            $this->db
                ->select("
                    SELECT 
                        ri.requisicao_id AS requisitionId,
                        po.nome AS productName,
                        po.foto AS productCover,
                        po.peso AS productWeight,
                        pum.nome AS productUnitMeasure,
                        ri.qtd AS qty,
                        ri.atendido as attended,
                        re.ponto_venda_id as pointSaleId
                    FROM lab_requisicao_item ri
                    INNER JOIN lab_requisicao AS re ON ri.requisicao_id = re.id
                    INNER JOIN lab_produto AS po ON ri.produto_id = po.id
                    INNER JOIN lab_produto_unidade_medida AS pum ON po.unidade_medida_id = pum.id
                    WHERE DATE(ri.created_at) BETWEEN DATE('{$dateIn}') AND DATE('{$dateOut}') {$queryInject}
                ");
        return $collection;
    }

}
