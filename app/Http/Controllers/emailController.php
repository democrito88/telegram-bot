<?php

namespace App\Http\Controllers;

use App\Mail\Correio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class emailController extends Controller
{
    public function enviar(Request $request){

        Mail::send(new Correio($request['email'], "Zezinho", $request['assunto'], $request['conteudo']));

        $mensagemMail = true;
        $usuarios = User::all();
        return view('home', compact('mensagemMail', 'usuarios'));
    }
}
