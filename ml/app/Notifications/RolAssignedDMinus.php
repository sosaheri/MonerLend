<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RolAssignedDMinus extends Notification
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
                    ->subject('No has cumplido con tus pagos en Monerlend')
                    ->greeting('Lo siento')
                    ->line('Se ha cambiado tu rango en Monerlend.')
                    ->line('')
                    ->line('A partir de Ahora eres del rango D=')
                    ->line('')
                    ->line('Contacta a soporte para aclarar la situacion de tu prestamo y que se restaure tu rango')                    
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
