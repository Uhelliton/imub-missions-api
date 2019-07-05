<?php
namespace IGestao\Domains\Auditing\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use IGestao\Domains\BookingRoom\Transformers\GuestBookingWithGuestOnlyTransformer;
use IGestao\Domains\Shared\Transformers\AccessTypeTransformer;

class LogAccessTransformer extends JsonResource
{
    /**
     * Transforme a coleção de recursos em uma matriz.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'url'        => $this->url,
            'ip'         => $this->endereco_ip,
            'agentUser'  => $this->agente_usuario,
            'guestBooking' => New GuestBookingWithGuestOnlyTransformer($this->guestBooking),
            'access'       => new AccessTypeTransformer($this->accessType),
        ];
    }
}
