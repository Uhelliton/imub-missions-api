<?php

namespace IGestao\Domains\Auditing;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class LogAccess extends Model implements AuditableContract
{
    use Auditable;

    /**
     * Tabela associada ao modelo
     *
     * @var string
     */
    protected $table = 'log_acesso';


    /**
     * Os atributos que são massa atribuíveis.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'endereco_ip', 'agente_usuario', 'hospede_reserva_id', 'tipo_acesso_id'
    ];


    /**
     * Indica se o modelo deve ser hora marcada.
     *
     * @var bool
     */
    public $timestamps = true;


    /**
     * Relacionamento com a entidade tipo acesso
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function accessType()
    {
        return $this->hasOne('IGestao\Domains\Shared\AccessType', 'id', 'tipo_acesso_id');
    }



    /**
     * Relacionamento com a entidade hospede reserva
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function guestBooking()
    {
        return $this->hasOne('IGestao\Domains\BookingRoom\GuestBooking', 'id', 'hospede_reserva_id');
    }


}
