<?php
namespace IGestao\Domains\Stock\Repositories\Contracts;

interface IndicatorTableInterface
{

    /**
     * Responsável para contar todas postagem por tabela
     *
     * @return array
     */
    public function countPostingsByTable();
}
