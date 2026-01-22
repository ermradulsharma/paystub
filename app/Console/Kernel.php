<?php

namespace App\Console;

use App\Jobs\CheckSubscriptions;
use App\Jobs\DeleteExtraPdf;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected $commands = [
        'app\Console\Commands\UserSubscriptionCommand',
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('user:subscription')->everyMinute();

        // $schedule->job(new CheckSubscriptions)->everyMinute();
        $schedule->job(new CheckSubscriptions)->dailyAt('23:59');
        $schedule->job(new DeleteExtraPdf)->dailyAt('23:59');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
