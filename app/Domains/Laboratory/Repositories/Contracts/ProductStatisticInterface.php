<?php
namespace IGestao\Domains\Laboratory\Repositories\Contracts;

interface ProductStatisticInterface
{

    /**
     * Responsável para filtrar os produtos com maior saida
     *
     * @return array
     */
    public function filterProductsWithGreaterOutput();
}