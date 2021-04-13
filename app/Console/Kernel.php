<?php

namespace App\Console;

use App\Http\Controllers\mensagemController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;

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
        // $schedule->command('inspire')->hourly();


        $schedule->call(function(){
            $mensagemInfo = array();
            $mensagemInfo['imagem'] = "https://chocolate.co.ao/wp-content/uploads/2020/05/4c4ca932d0ef9e3c0ef3.jpg";
            $mensagemInfo['legenda'] = "Olá, eu sou o duende da sorte! Jogue estes números para ganhar na megasena! "
            ." (".random_int(1, 60).") (".random_int(1, 60).") (".random_int(1, 60).") (".random_int(1, 60).") (".random_int(1, 60).") (".random_int(1, 60).") ";
            $mensagemInfo['id'] = 1;
            $request = new Request($mensagemInfo);

            $mc = new mensagemController();
            $mc->enviar($request);
        })->hourly();
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
