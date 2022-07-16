<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:SMS')->dailyAt('10:00')->timezone('Europe/Vilnius');
        $schedule->command('dump:database')->dailyAt('10:10')->timezone('Europe/Vilnius');
//----------------------------------------------------------------
        // $schedule->command('send:SMS')->when(function (){
        //      Carbon::now();
        //     // return Carbon::createFromFormat('H:i:s', '10:10:00')->isPast();
        // });
        // $schedule->command('send:SMS')->when(function (){
        //     return Carbon::now();
        //     // return Carbon::createFromFormat('H:i:s', '10:10:00')->isPast();
        // });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
