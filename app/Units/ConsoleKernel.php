<?php

namespace IGestao\Units;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;
use Illuminate\Foundation\Inspiring;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Foundation\Application;


class ConsoleKernel extends Kernel
{
    /**
     * Create a new Console Kernel instance, using env outside directory
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     */
    public function __construct(Application $app, Dispatcher $events)
    {
        $app->useEnvironmentPath('/etc/config/igestao-api/');
        parent::__construct($app, $events);
    }


    /**
     * Os comandos Artisan fornecidos pelo seu aplicativo
     *
     * @var array
     */
    protected $commands = [
        Core\Console\Commands\CloseSolicitation::class,
        Core\Console\Commands\NotificationAlacarteBooking::class,
        Core\Console\Commands\MailSolicitationPending::class,
        Core\Console\Commands\NotificationAlert::class,
        Core\Console\Commands\MailLogAccessWeekly::class,
        Core\Console\Commands\MailLogAccessWeekByRoutesType::class,
        Core\Console\Commands\SincGuestRegister::class,
    ];

    /**
     * Defina a programação de comandos da aplicação
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('close:solicitation')->everyMinute();
        $schedule->command('mail:solicitation-pending')->everyMinute();
        $schedule->command('mail:log-access-weekly')->everyMinute();
        $schedule->command('mail:log-access-weekly-routes-type')->everyMinute();
        $schedule->command('notifications:alert')->everyMinute();
        $schedule->command('notifications:reserve-gastronomy')->everyMinute();
        $schedule->command('sinc:guest-register')->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {

    }
}
