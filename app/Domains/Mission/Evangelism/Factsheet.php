<?php

namespace IGestao\Domains\Mission\Evangelism;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;
use Carbon\Carbon;

class Factsheet extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'ms_ficha_inscricao';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nome', 'idade', 'telefone', 'sexo_id', 'curso', 'conversao', 'celula', 'projeto_id', 'equipe_id',
        'membro_evangelismo', 'Acompanhantes', 'qtd_acompanhante', 'data_evangelismo'
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
    public function setDataEvangelismoAttribute($value)
    {
        $value =  str_replace('/', '-', $value);
        $this->attributes['data_evangelismo'] = Carbon::parse($value)->format('Y-m-d');
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
     * Relacionamento com a entidade {ms_projeto}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function project()
    {
        return $this->hasOne('IGestao\Domains\Mission\Project\Project', 'id', 'projeto_id');
    }


    /**
     * Relacionamento com a entidade {ms_equipe}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function team()
    {
        return $this->hasOne('IGestao\Domains\Mission\Team\Team', 'id', 'equipe_id');
    }


    /**
     * Relacionamento com a entidade {ms_ficha_inscricao_endereco}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne('IGestao\Domains\Mission\Evangelism\FactsheetAddress', 'ficha_inscricao_id', 'id');
    }

    /**
     * Relacionamento com a entidade {ms_conversao}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function conversion()
    {
        return $this->hasOne('IGestao\Domains\Mission\Evangelism\Conversion', 'ficha_inscricao_id', 'id');
    }


    /**
     * Relacionamento com a entidade {ms_curso}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function course()
    {
        return $this->hasOne('IGestao\Domains\Mission\Evangelism\Course', 'ficha_inscricao_id', 'id');
    }
}
