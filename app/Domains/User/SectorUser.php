<?php

namespace IGestao\Domains\User;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class SectorUser extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'acl_setor_usuario';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id', 'setor_id'
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
     * Relacionamento com a entidade {lab_setor};
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sector()
    {
        return $this->hasOne('IGestao\Domains\Laboratory\Sector', 'id', 'setor_id');
    }
}
