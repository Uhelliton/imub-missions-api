<?php

namespace IGestao\Units\Core\Console\Commands;

use Illuminate\Console\Command;
use Log;
use IGestao\Domains\Messenger\Jobs\SendMailSolicitationPending;

class MailSolicitationPending extends Command
{
    /**
     * O nome ea assinatura do comando do console.
     *
     * @var string
     */
    protected $signature = 'mail:solicitation-pending';

    /**
     * Descrição do comando do console.
     *
     * @var string
     */
    protected $description = 'Envia um email com as solicitacoes pendentes';

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
        dispatch( new SendMailSolicitationPending() );

        Log::info('Email com solicitações pendentes enviado!');
    }
}
