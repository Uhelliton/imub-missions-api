<?php
namespace IGestao\Domains\Stock\Repositories;

use IGestao\Support\Repository\AbstractQueryBuilderRepository;
use IGestao\Domains\Stock\Repositories\Contracts\StockStatisticInterface;

class StockStatisticRepository extends AbstractQueryBuilderRepository implements StockStatisticInterface
{


    /**
     * Responsável para filtrar saidas de produtos periodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param int pointSaleId
     * @return array
     */
    public function filterProductsOutuptsByPeriodsOfDates(string $dateIn, string $dateOut, ?int $pointSaleId)
    {
        $queryInject = ($pointSaleId) ? "WHERE pointSaleId = {$pointSaleId}" : '';

        $collection =
            $this->db
                ->select("
                    SELECT * FROM (
                         SELECT 
                            'Requisição' AS type,
                            ri.requisicao_id AS requisitionId,
                            po.nome AS productName,
                            po.foto AS productCover,
                            po.peso AS productWeight,
                            pum.nome AS productUnitMeasure,
                            ri.qtd AS qty,
                            ri.atendido as attended,
                            re.ponto_venda_id as pointSaleId,
                            0 as reasonId  
                        FROM lab_requisicao_item ri
                        INNER JOIN lab_requisicao AS re ON ri.requisicao_id = re.id
                        INNER JOIN lab_produto AS po ON ri.produto_id = po.id
                        INNER JOIN lab_produto_unidade_medida AS pum ON po.unidade_medida_id = pum.id
                        WHERE DATE(ri.created_at) BETWEEN DATE('{$dateIn}') AND DATE('{$dateOut}')
                    UNION
                        SELECT 
                            'Baixa estoque' AS type,
                            bi.baixa_estoque_id AS requisitionId,
                            po.nome AS productName,
                            po.foto AS productCover,
                            po.peso AS productWeight,
                            pum.nome AS productUnitMeasure,
                            bi.qtd AS qty,
                            0 as attended,
                            0 as pointSaleId,
                            be.motivo_id as reasonId
                        FROM lab_baixa_estoque_item bi
                        INNER JOIN lab_baixa_estoque AS be ON bi.baixa_estoque_id = be.id
                        INNER JOIN lab_produto AS po ON bi.produto_id = po.id
                        INNER JOIN lab_produto_unidade_medida AS pum ON po.unidade_medida_id = pum.id
                        WHERE DATE(bi.created_at) BETWEEN DATE('{$dateIn}') AND DATE('{$dateOut}')
                    ) as data {$queryInject}
                ");
        return $collection;
    }



    /**
     * Responsável para filtrar entradas de produtos periodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param int $reasonId
     * @return array
     */
    public function filterProductsEntriesByPeriodsOfDates(string $dateIn, string $dateOut, ?int $reasonId)
    {
        $queryInject = ($reasonId) ? "AND ee.motivo_id = {$reasonId}" : '';

        $collection =
            $this->db
                ->select("
                    SELECT 
                        ei.entrada_estoque_id AS stockEntryId,
                        pd.nome AS productName,
                        pd.foto AS productCover,
                        pd.peso AS productWeight,
                        pum.nome AS productUnitMeasure,
                        ei.qtd AS qty
                    FROM lab_entrada_estoque_item ei
                    INNER JOIN lab_entrada_estoque AS ee ON ei.entrada_estoque_id = ee.id
                    INNER JOIN lab_produto AS pd ON ei.produto_id = pd.id
                    INNER JOIN lab_produto_unidade_medida AS pum ON pd.unidade_medida_id = pum.id
                    WHERE DATE(ei.created_at) BETWEEN DATE('{$dateIn}') AND DATE('{$dateOut}') {$queryInject}
                ");
        return $collection;
    }


    /**
     * Responsável para filtrar o estoque por períodos de datas
     *
     * @param string $dateIn
     * @param string $dateOut
     * @param array $sectorIds
     * @return array
     */
    public function filterStockByPeriodsOfDates(string $dateIn, string $dateOut, ?array $sectorIds)
    {
        $queryInject = '';
        if(isset($sectorIds)) {
            $idsCollection = implode(', ' , $sectorIds);
            $queryInject   = ($sectorIds) ? "AND se.id IN ({$idsCollection})" : '';
        }


        $collection =
            $this->db
                ->select("
                  	SELECT
                  	    pd.nome AS productName,
                        pd.foto AS productCover,
                        pd.peso AS productWeight,
                        pc.nome AS productCategory,
                        pum.nome AS productUnitMeasure,
                        se.id AS sectorId,
                        se.nome AS sectorName,
                        es.qtd AS qty
                    FROM lab_estoque es
                    INNER JOIN lab_produto AS pd ON es.produto_id = pd.id
                    INNER JOIN lab_produto_categoria AS pc ON pd.categoria_id = pc.id
                    INNER JOIN lab_produto_unidade_medida AS pum ON pd.unidade_medida_id = pum.id
                    INNER JOIN lab_setor AS se ON pc.setor_id = se.id 
                    WHERE DATE(es.created_at) BETWEEN DATE('{$dateIn}') AND DATE('{$dateOut}') {$queryInject}
                ");
        return $collection;
    }

}
