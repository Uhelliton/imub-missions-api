<?php

namespace IGestao\Domains\Requisition;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Requisition extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'lab_requisicao';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'ponto_venda_id', 'data', 'requisitante_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Relacionamento com a entidade ponto venda
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unit()
    {
        return $this->hasOne('IGestao\Domains\PointSale\PointSale', 'id', 'ponto_venda_id');
    }


    /**
     * Relacionamento com a entidade requsição item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('IGestao\Domains\Requisition\RequisitionItem', 'requisicao_id', 'id');
    }


    /**
     * Relacionamento com a entidade {usuario}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user ()
    {
        return $this->hasOne('IGestao\Domains\User\User', 'id', 'requisitante_id');
    }


}
