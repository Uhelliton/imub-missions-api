<?php

namespace IGestao\Units\Core\Console\Commands;

use Illuminate\Console\Command;
use Log;
use IGestao\Domains\BookingRoom\Jobs\CreateOrUpdateGuestRegister;

class SincGuestRegister extends Command
{
    /**
     * O nome ea assinatura do comando do console.
     *
     * @var string
     */
    protected $signature = 'sinc:guest-register';

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
     *
     * @return mixed
     */
    public function handle()
    {
        dispatch( new CreateOrUpdateGuestRegister());
    }
}
