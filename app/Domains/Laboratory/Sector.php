<?php

namespace IGestao\Domains\Laboratory;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Sector extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'lab_setor';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'descricao'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Relacionamento com a entidade {produtos_categoria}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productCategory()
    {
        return $this->hasMany('IGestao\Domains\Laboratory\ProductCategory', 'setor_id', 'id');
    }
}
