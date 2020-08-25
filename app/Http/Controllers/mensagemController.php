<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications\TelegramNotification;
use Illuminate\Http\Request;

class mensagemController extends Controller
{
    public function enviar(Request $request){
        $mensagemInfo = $request->all();
        $id = $request['id'];

        User::where('id', '=', $id)->get()[0]->notify(new TelegramNotification($mensagemInfo));

        $usuarios = User::all();
        return view('home', compact('mensagemInfo', 'usuarios'));
    }
}
