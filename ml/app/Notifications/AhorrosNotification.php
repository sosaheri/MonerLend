<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AhorrosNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
        ->subject('Gracias por realizar tu deposito')
        ->greeting('Felicitaciones')
        ->line('Has realizado en deposito en la plataforma.')
        ->line('')                          
        ->line('Podras realizar abonos sobre tus ahorros cada 10 días.')
        ->line('')
        ->line('Por los ahorros recibiras una rentabilidad anual del 10% con pagos mensuales.') 
        ->line('Podras retirar tus fondos y rentabilidad una vez transcurrido 30 días calendario luego de iniciado el plan de ahorro.')                   
        //->action('Notification Action', url('/'))
        ->line('Gracias por usar nuestra aplicacion y pertenercer a la comunidad');
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
}
