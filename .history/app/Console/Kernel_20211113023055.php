<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\TermiiSms;
use Illuminate\Support\Facades\DB;

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
        $schedule->call(function(){

            // remember yo change this if it's not nigeria that's timezone
            date_default_timezone_set('Africa/Lagos');
            // echo date_default_timezone_get();
            // echo date('Y-m-d H:i:s');

            // while creating cron, make it charge once a day

            $this::charge_every_active_sub();

        })->everyThirtyMinutes();
        // $schedule->command('inspire')
        //          ->hourly();
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

    public function charge_every_active_sub(){
        $active = DB::select('SELECT * from investors_packages_linker where status = ?', [1]);
        foreach ($active as $db) {

        }
    }
}
