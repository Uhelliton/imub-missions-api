<?php

namespace IGestao\Domains\Mission\Evangelism;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;
use Carbon\Carbon;

class Conversion extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'ms_conversao';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'ficha_inscricao_id', 'local_id', 'data_decisao'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Converte data para o formato default mysql
     * Metodo é excultado antes de gravar dados no banco
     *
     * @param  string  $value
     */
    public function setDataDecisaoAttribute($value)
    {
        $value =  str_replace('/', '-', $value);
        $this->attributes['data_decisao'] = Carbon::parse($value)->format('Y-m-d');
    }


}
