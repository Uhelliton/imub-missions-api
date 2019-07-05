<?php

namespace IGestao\Domains\User;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class RoleUser extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'acl_funcao_usuario';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id', 'funcao_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Relacionamento;
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('IGestao\Domains\User\Role', 'id', 'funcao_id');
    }
}
