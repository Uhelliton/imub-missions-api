<?php
namespace IGestao\Domains\Laboratory\Repositories;

use IGestao\Support\Repository\AbstractQueryBuilderRepository;
use IGestao\Domains\Laboratory\Repositories\Contracts\ProductStatisticInterface;

class ProductStatisticRepository extends AbstractQueryBuilderRepository implements ProductStatisticInterface
{

    /**
     * Responsável para filtrar os produtos com maior saida
     *
     * @return array
     */
    public function filterProductsWithGreaterOutput()
    {
        $collection =
            $this->db
                ->select("
                    SELECT 
                        p.nome AS product,
                        IFNULL(SUM(r.qtd + b.qtd), r.qtd) AS total
                    FROM  lab_requisicao_item AS r
                    INNER JOIN lab_produto AS p ON r.produto_id = p.id
                    LEFT JOIN lab_baixa_estoque_item AS b ON r.produto_id = b.produto_id
                    GROUP BY r.produto_id
                    ORDER BY total desc
                    LIMIT 10
                  ");
        return $collection;
    }

}
