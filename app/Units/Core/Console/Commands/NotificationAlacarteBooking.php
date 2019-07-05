<?php

namespace IGestao\Units\Core\Console\Commands;

use Illuminate\Console\Command;
use IGestao\Units\Core\Jobs\SendPushMessageAlacarteBooking;
use Carbon\Carbon;
use Log;

class NotificationAlacarteBooking extends Command
{
    /**
     * O nome ea assinatura do comando do console.
     *
     * @var string
     */
    protected $signature = 'notifications:reserve-gastronomy';

    /**
     * Descrição do comando do console.
     *
     * @var string
     */
    protected $description = 'Envio de notificações de reservas à la carte';

    /**
     * Cria uma nova instância de comando.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execulta o comando
     * Comando: execulta o disparo de mensagens push para reservas efetivada de alacarte
     *
     * @return mixed
     */
    public function handle()
    {
        dispatch( new SendPushMessageAlacarteBooking([
            'dateReserve' => Carbon::now()->format('Y-m-d'),
            'hourReserve' => '19:30:00',
        ]));

        dispatch( new SendPushMessageAlacarteBooking([
            'dateReserve' => Carbon::now()->format('Y-m-d'),
            'hourReserve' => '21:30:00',
        ]));

        Log::info('Envio de push reserva À La Carte');
    }
}
