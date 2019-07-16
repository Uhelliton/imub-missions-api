<?php

namespace IGestao\Domains\Mission\Team;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Team extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'ms_equipe';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'cor_hexadecimal', 'lider_id', 'projeto_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Relacionamento com a entidade {ms_membro}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function leader()
    {
        return $this->hasOne('IGestao\Domains\Mission\Team\Member', 'id', 'lider_id');
    }


    /**
     * Relacionamento com a entidade {ms_projeto}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('IGestao\Domains\Mission\Project\Project', 'id', 'projeto_id');
    }

    /**
     * Relacionamento com a entidade {ms_equipe_membro}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teamMembers()
    {
        return $this->hasMany('IGestao\Domains\Mission\Team\TeamMember', 'equipe_id', 'id');
    }
}
