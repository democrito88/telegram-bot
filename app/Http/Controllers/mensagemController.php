<?php

namespace App\Http\Controllers;

use App\Mensagem;
use App\Notifications\TelegramNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mensagemController extends Controller
{
    public function enviar(){
        $mensagem = filter_input(INPUT_POST, 'mensagem');
        $imagem = filter_input(INPUT_POST, 'imagem');
        $legendaImagem = filter_input(INPUT_POST, 'legenda');

        if(!is_null($mensagem) && $mensagem != ""){
            Auth::user()->notify(new TelegramNotification($mensagem));
        }
        else if(!is_null($imagem) && $imagem != ""){
            Auth::user()->notify(new TelegramNotification("", $imagem, $legendaImagem));
        }

        return view('home', compact('mensagem', 'imagem', 'legendaImagem'));
    }
}
