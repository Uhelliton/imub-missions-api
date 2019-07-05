<?php

namespace IGestao\Units\Core\Console\Commands;

use Illuminate\Console\Command;
use IGestao\Domains\Messenger\Jobs\ClosingSolicitationInOpen;
use Log;

class CloseSolicitation extends Command
{
    /**
     * O nome ea assinatura do comando do console.
     *
     * @var string
     */
    protected $signature = 'close:solicitation';

    /**
     * Descrição do comando do console.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * Comando: faz o fechamento das solicitacoes, com base nos chamados fechado via Telegram
     *
     * @return mixed
     */
    public function handle()
    {
        dispatch( new ClosingSolicitationInOpen() );

        Log::info('Fechamento de solicitações');
    }
}
