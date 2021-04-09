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
            $mensagemInfo['imagem'] = "https://img1.migalhas.uol.com.br/gf_base/empresas/MIGA/imagens/ACE835264E07463CBCB9DFDB89CE5BF9C414_tele.jpg";
            $mensagemInfo['legenda'] = "De hora em hora o SBT informa o resultado parcial da telesena de Tiradentes!";
            $mensagemInfo['id'] = 2;
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
