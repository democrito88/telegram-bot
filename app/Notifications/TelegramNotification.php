<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use TelegramNotifications\TelegramChannel;
use TelegramNotifications\Messages\TelegramMessage;
use TelegramNotifications\Messages\TelegramPhoto;
use TelegramNotifications\Messages\TelegramVideo;
use TelegramNotifications\Messages\TelegramSticker;
use TelegramNotifications\Messages\TelegramContact;
use TelegramNotifications\Messages\TelegramDocument;
use TelegramNotifications\Messages\TelegramLocation;

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
        $this->mensagem = isset($mensagemInfo['mensagem']) ? $mensagemInfo['mensagem'] : null;
        $this->imagem = isset($mensagemInfo['imagem']) ? $mensagemInfo['imagem'] : null;
        $this->legenda = isset($mensagemInfo['legenda']) ? $mensagemInfo['legenda'] : "";
        $this->documento = isset($mensagemInfo['documento']) ? $mensagemInfo['documento'] : null;
        $this->numeroContato = isset($mensagemInfo['numeroContato']) ? $mensagemInfo['numeroContato'] : null;
        $this->nomeContato = isset($mensagemInfo['nomeContato']) ? $mensagemInfo['nomeContato'] : null;
        $this->sobrenomeContato = isset($mensagemInfo['sobrenomeContato']) ? $mensagemInfo['sobrenomeContato'] : null;
        $this->video = isset($mensagemInfo['video']) ? $mensagemInfo['video'] : null;
        $this->sticker = isset($mensagemInfo['sticker']) ? $mensagemInfo['sticker'] : null;
        $this->latitude = isset($mensagemInfo['latitude']) ? $mensagemInfo['latitude'] : null;
        $this->longitude = isset($mensagemInfo['logitude']) ? $mensagemInfo['longitude'] : null;
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
        if (!is_null($this->mensagem)) {
            return (new TelegramMessage())->text($this->mensagem);
        } if (!is_null($this->imagem)) {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legenda);
        } if (!is_null($this->video)) {
            return (new TelegramVideo())->video($this->video)->caption($this->legenda);
        } if (!is_null($this->documento)) {
            return (new TelegramDocument())->document($this->documento)->caption($this->legenda);
        } if (!is_null($this->numeroContato)) {
            return (new TelegramContact())->contact($this->numeroContato)->first_name($this->nomeContato)->last_name($this->sobrenomeContato);
        } if (!is_null($this->sticker)) {
            return (new TelegramSticker())->sticker($this->sticker);
        } if (!is_null($this->latitude)) {
            return (new TelegramLocation())->latitude($this->latitude)->longitude($this->longitude);
        }
    }
}
