<?php

namespace IGestao\Domains\Stock;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class StockEntryItem extends Model implements AuditableContract
{
    use Auditable;


    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'lab_entrada_estoque_item';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'produto_id', 'entrada_estoque_id', 'qtd'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
     public $timestamps = true;


    /**
     * Relacionamento com a entidade {produto}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne('IGestao\Domains\Laboratory\Product', 'id', 'produto_id');
    }

}
