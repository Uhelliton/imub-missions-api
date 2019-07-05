<?php

namespace IGestao\Domains\User;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class PointSaleUser extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'alc_ponto_venda_usuario';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id', 'ponto_venda_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Relacionamento com a entidade {acl_usuario};
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('IGestao\Domains\User\User', 'id', 'usuario_id');
    }


    /**
     * Relacionamento com a entidade {ponto_venda};
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pointSale()
    {
        return $this->hasOne('IGestao\Domains\PointSale\PointSale', 'id', 'ponto_venda_id');
    }
}
