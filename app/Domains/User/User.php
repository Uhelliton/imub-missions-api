<?php

namespace IGestao\Domains\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Contracts\UserResolver;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements AuditableContract, UserResolver, JWTSubject
{

    use Notifiable, Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'acl_usuario';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password'
    ];

    /**
     * Os atributos que devem estar ocultos para matrizes
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public static function resolveId()
    {
        return \Auth::check() ? \Auth::user()->getAuthIdentifier() : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function resolve(){}


    /**
     * Relacionamento com a entidade {acl_funcao_usurio}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roleUser ()
    {
        return $this->hasOne('IGestao\Domains\User\RoleUser', 'usuario_id', 'id');
    }

    /**
     * Relacionamento com a entidade {acl_funcao_usurio}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pointSaleUser ()
    {
        return $this->hasMany('IGestao\Domains\User\PointSaleUser', 'usuario_id', 'id');
    }


    /**
     * Relacionamento com a entidade {acl_setor_usuario}
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sectorUser ()
    {
        return $this->hasMany('IGestao\Domains\User\SectorUser', 'usuario_id', 'id');
    }
}
