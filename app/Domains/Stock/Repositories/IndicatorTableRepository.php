<?php
namespace IGestao\Domains\Stock\Repositories;

use IGestao\Support\Repository\AbstractQueryBuilderRepository;
use IGestao\Domains\Stock\Repositories\Contracts\IndicatorTableInterface;

class IndicatorTableRepository extends AbstractQueryBuilderRepository implements IndicatorTableInterface
{

    /**
     * Responsável para contar todas postagem por tabela
     *
     * @return array
     */
    public function countPostingsByTable()
    {
        $collection =
            $this->db
                ->select("SELECT
                     (SELECT COUNT(DISTINCT id) FROM lab_produto) AS product,
                     (SELECT COUNT(DISTINCT id) FROM lab_requisicao) AS requisition,
                     (SELECT COUNT(DISTINCT id) FROM lab_entrada_estoque) AS stock_entry,
                     (SELECT COUNT(DISTINCT id) FROM lab_baixa_estoque) AS stock_reduce
                  ");
        return current($collection);
    }

}
