<?php

namespace IGestao\Units\Core\Console\Commands;

use Illuminate\Console\Command;
use Log;
use IGestao\Domains\Messenger\Jobs\SendMaiLogAccessWeekly;

class MailLogAccessWeekly extends Command
{
    /**
     * O nome ea assinatura do comando do console.
     *
     * @var string
     */
    protected $signature = 'mail:log-access-weekly';

    /**
     * Descrição do comando do console.
     *
     * @var string
     */
    protected $description = 'Envia um email com os logs de acessos semanal';

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
     * Comando: Dispar
     *
     * @return mixed
     */
    public function handle()
    {
        dispatch( new SendMaiLogAccessWeekly() );

        Log::info('Email de logs enviado com sucesso');
    }
}
