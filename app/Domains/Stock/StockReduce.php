<?php

namespace IGestao\Domains\Stock;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class StockReduce extends Model implements AuditableContract
{
    use Auditable;


    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'lab_baixa_estoque';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
         'motivo_id', 'observacao', 'usuario_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
     public $timestamps = true;


    /**
     * Relacionamento com a entidade {motivo_baixa}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reason()
    {
        return $this->hasOne('IGestao\Domains\Stock\ReasonReduce', 'id', 'motivo_id');
    }


    /**
     * Relacionamento com a entidade {baixa_estoque_item}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('IGestao\Domains\Stock\StockReduceItem', 'baixa_estoque_id', 'id');
    }


    /**
     * Relacionamento com a entidade {usuario}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user ()
    {
        return $this->hasOne('IGestao\Domains\User\User', 'id', 'usuario_id');
    }
}
