<?php
namespace IGestao\Support\Repository;

use Illuminate\Database\DatabaseManager;

abstract class AbstractQueryBuilderRepository {

    /*
     * @var  $db
     * @type instace class
     */
    protected $db;

    /**
     * Injeta as dependências da classe
     *
     * @param DatabaseManager $databaseManager)
     */
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->db = $databaseManager;
    }
}