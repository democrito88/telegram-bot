<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Correio extends Mailable
{
    use Queueable, SerializesModels;

    private $nomeDestinatario;
    private $enderecoDestinatario;
    private $assunto;
    private $conteudo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($enderecoDestinatario, $nomeDestinatario = "", $assunto = "Assunto em branco", $conteudo = "Conteúdo em branco")
    {
        $this->nomeDestinatario = $nomeDestinatario;
        $this->enderecoDestinatario = $enderecoDestinatario;
        $this->assunto = $assunto;
        $this->conteudo = $conteudo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->assunto);
        $this->to($this->enderecoDestinatario, $this->nomeDestinatario);
        $conteudo = $this->conteudo;
        return $this->view('mail.email', compact('conteudo'));
    }
}
