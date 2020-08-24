<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use TelegramNotifications\TelegramChannel;
use TelegramNotifications\Messages\TelegramCollection;

class TelegramNotification extends Notification
{
    use Queueable;
    private $mensagem;
    private $imagem;
    private $legenda;
    private $documento;
    private $numeroContato;
    private $nomeContato;
    private $sobrenomeContato;
    private $video;
    private $sticker;
    private $latitude;
    private $longitude;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensagemInfo = array())
    {
        $this->mensagem = isset($mensagemInfo['mensagem']) && !is_null($mensagemInfo['mensagem'])? $mensagemInfo['mensagem'] : null;
        $this->imagem = isset($mensagemInfo['imagem']) && !is_null($mensagemInfo['imagem'])? $mensagemInfo['imagem'] : null;
        $this->legenda = isset($mensagemInfo['legenda']) && !is_null($mensagemInfo['legenda'])? $mensagemInfo['legenda'] : null;
        $this->documento = isset($mensagemInfo['documento']) && !is_null($mensagemInfo['documento'])? $mensagemInfo['documento'] : null;
        $this->numeroContato = isset($mensagemInfo['numeroContato']) && !is_null($mensagemInfo['numeroContato'])? $mensagemInfo['numeroContato'] : null;
        $this->nomeContato = isset($mensagemInfo['nomeContato']) && !is_null($mensagemInfo['nomeContato'])? $mensagemInfo['nomeContato'] : null;
        $this->sobrenomeContato = isset($mensagemInfo['sobrenomeContato']) && !is_null($mensagemInfo['sobrenomeContato'])? $mensagemInfo['sobrenomeContato'] : null;
        $this->video = isset($mensagemInfo['video']) && !is_null($mensagemInfo['video'])? $mensagemInfo['video'] : null;
        $this->sticker = isset($mensagemInfo['sticker']) && !is_null($mensagemInfo['sticker'])? $mensagemInfo['sticker'] : null;
        $this->latitude = isset($mensagemInfo['latitude']) && !is_null($mensagemInfo['latitude'])? $mensagemInfo['latitude'] : null;
        $this->longitude = isset($mensagemInfo['logitude']) && !is_null($mensagemInfo['longitude'])? $mensagemInfo['longitude'] : null;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toTelegram(){
        if (isset($this->mensagem) && $this->mensagem != "") {
            return (new TelegramMessage())->text($this->mensagem);

        } if (isset($this->imagem) && $this->imagem != "") {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legenda);
        } if (isset($this->video)) {
            return (new TelegramVideo())->video($this->video)->caption($this->legenda);
        } if (isset($this->documento) && $this->imagem != "") {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legenda);
        } if (isset($this->imagem) && $this->imagem != "") {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legenda);
        } if (isset($this->imagem) && $this->imagem != "") {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legenda);
        } if (isset($this->imagem) && $this->imagem != "") {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legenda);
        } if (isset($this->imagem) && $this->imagem != "") {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legenda);
        }
        //dd(['mensagem' => $this->mensagem, 'imagem' => $this->imagem, 'legenda' => $this->legenda]);

        /*return (new TelegramCollection())
            ->message(['text' => $this->mensagem]);
            //->photo(['photo' => $this->imagem, 'caption' => $this->legenda]);
            /*->video(['video' => $this->video, 'caption' => $this->legenda])
            ->document(['document' => $this->documento, 'caption' => $this->legenda])
            ->contact(['phone_number' => $this->numeroContato, 'first_name' => $this->nomeContato, 'last_name' => $this->sobrenomeContato])
            ->location(['latitude' => $this->latitude, 'longitude' => $this->longitude])
            ->sticker(['sticker' => $this->sticker]);*/
    }
}
