<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AprobarAhorrosNotification extends Notification
{
    use Queueable;

    protected $aprobacion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $aprobacion)
    {
        $this->aprobacion = $aprobacion;
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
        ->subject('Has realizado un deposito para ahorros de '. $this->aprobacion['amount']. ' USD')
        ->greeting('Necesitamos tu aprobacion')
        ->line('Tienes una solicitud para confirmar un deposito de '. $this->aprobacion['amount']*-1 .' USD')                          
        ->line('por un lapso de '.$this->aprobacion['months'] .' meses')
        ->line('')
        ->line('si estas de acuerdo presiona el siguiente botón.') 
        ->action('Confirmar Deposito de ahorro', url("/ahorrar" , $this->aprobacion ) )
        ->line('Gracias por usar nuestra aplicación y pertenecer a la comunidad');
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
