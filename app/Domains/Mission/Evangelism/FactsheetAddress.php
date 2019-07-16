<?php

namespace IGestao\Domains\Mission\Evangelism;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;
use Carbon\Carbon;

class FactsheetAddress extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'ms_ficha_inscricao_endereco';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'rua', 'numero', 'referencia', 'bairro_id', 'cidade_id', 'ficha_inscricao_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Relacionamento com a entidade {ms_bairro}
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function district()
    {
        return $this->hasOne('IGestao\Domains\Mission\Locale\District', 'id', 'bairro_id');
    }

}
