<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use TelegramNotifications\TelegramChannel;
use TelegramNotifications\Messages\TelegramMessage;
use TelegramNotifications\Messages\TelegramPhoto;

class TelegramNotification extends Notification
{
    use Queueable;
    private $mensagem;
    private $imagem;
    private $legendaImagem;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensagem = "", $imagem = "", $legendaImagem = "")
    {
        $this->mensagem = $mensagem;
        $this->imagem = $imagem;
        $this->legendaImagem = $legendaImagem;
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
        if ($this->mensagem == "") {
            return (new TelegramPhoto())->photo($this->imagem)->caption($this->legendaImagem);
        } else {
            return (new TelegramMessage())->text($this->mensagem);
        }
    }
}
