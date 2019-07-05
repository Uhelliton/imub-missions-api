<?php

namespace IGestao\Units\Core\Console\Commands;

use Illuminate\Console\Command;
use IGestao\Domains\Messenger\Jobs\SendPushNotificationAlert;
use Log;

class NotificationAlert extends Command
{
    /**
     * O nome ea assinatura do comando do console.
     *
     * @var string
     */
    protected $signature = 'notifications:alert';

    /**
     * Descrição do comando do console.
     *
     * @var string
     */
    protected $description = 'Envio de mensagem notificações de alertas';

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
        dispatch(new SendPushNotificationAlert());
        Log::info('Envio de notificações de alertas');
    }
}
