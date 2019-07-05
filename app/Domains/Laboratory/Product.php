<?php

namespace IGestao\Domains\Laboratory;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Product extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'lab_produto';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nome', 'peso', 'descricao_porcao', 'foto', 'categoria_id', 'unidade_medida_id',
        'status_id', 'data_previsao', 'estoque_minimo'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = true;



    /**
     * Relacionamento com a entidade {produto_galeria}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function stock()
    {
        return $this->hasOne('IGestao\Domains\Stock\Stock', 'produto_id', 'id');
    }


    /**
     * Relacionamento com a entidade {categoria_produto}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('IGestao\Domains\Laboratory\ProductCategory', 'id', 'categoria_id');
    }


    /**
     * Relacionamento com a entidade {produto_status}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne('IGestao\Domains\Laboratory\ProductStatus', 'id', 'status_id');
    }


    /**
     * Relacionamento com a entidade {produto_unidade_medida}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unitMeasure()
    {
        return $this->hasOne('IGestao\Domains\Laboratory\ProductUnitMeasure', 'id', 'unidade_medida_id');
    }
}
