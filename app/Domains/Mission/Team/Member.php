<?php

namespace IGestao\Domains\Mission\Team;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;
use Carbon\Carbon;

class Member extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'ms_membro';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sexo_id', 'data_nascimento', 'telefone', 'email', 'estado_civil_id', 'status_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Converte data para o formato default mysql
     * Metodo é excultado antes de gravar dados no banco
     *
     * @param  string  $value
     */
    public function setDataNascimentoAttribute($value)
    {
        $value =  str_replace('/', '-', $value);
        $this->attributes['data_nascimento'] = Carbon::parse($value)->format('Y-m-d');
    }


    /**
     * Relacionamento com a entidade {sexo}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function gender()
    {
        return $this->hasOne('IGestao\Domains\Membership\Gender', 'id', 'sexo_id');
    }


    /**
     * Relacionamento com a entidade {membro_status}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('IGestao\Domains\Membership\MemberStatus', 'id', 'status_id');
    }


    /**
     * Relacionamento com a entidade {estado_civil}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function civilStatus()
    {
        return $this->hasOne('IGestao\Domains\Membership\CivilStatus', 'id', 'estado_civil_id');
    }


    /**
     * Relacionamento com a entidade {ms_equipe_membro}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teamMember()
    {
        return $this->hasOne('IGestao\Domains\Mission\Team\TeamMember', 'membro_id', 'id');
    }
}
