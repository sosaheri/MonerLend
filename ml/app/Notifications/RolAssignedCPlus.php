<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RolAssignedCPlus extends Notification
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
                    ->subject('Nuevo rango de usuario en Monerlend')
                    ->greeting('Felicitaciones')
                    ->line('Has obtenido un nuevo rango en Monerlend, por realizar tu primer deposito de ahorro.')
                    ->line('')
                    ->line('A partir de Ahora eres del rango C+')
                    ->line('')
                    ->line('Con este rango empiezas a ganar tokens MRL')                    
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
