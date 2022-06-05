<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Models\Tarea;
use App\Models\User;
use Notification;
use App\Notifications\MailParametrizado;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $user = User::where('name','antonio')->get();
            $tasks = Tarea::all();
            
            foreach ($tasks as $tarea) {

                $fechaTarea = Carbon::parse($tarea->date_finally)->toDateString();
                $hoy = Carbon::now()->addDays(1);
                if($hoy->isSameDay($fechaTarea)) { 
                    $details = [
                        'greeting' => 'Hi Artisan',
                        'body' => $tarea->name,
                        'thanks' => 'Thank you for using HackTheStuff article!',
                        'actionText' => 'View My Site',
                        'actionURL' => url('https://hackthestuff.com'),
                        'order_id' => 'Order-20190000151'
                    ];
            
                    Notification::send($user, new MailParametrizado($details));
                }
            }

        })->everyTwoMinutes();	

        // $schedule->command('inspire')->hourly();
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
