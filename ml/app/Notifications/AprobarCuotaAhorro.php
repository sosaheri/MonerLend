<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AprobarCuotaAhorro extends Notification
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
        ->subject('Has realizado un deposito para tu plan de ahorros')
        ->greeting('Necesitamos tu aprobación')
        ->line('Tienes una solicitud para confirmar un pago de '. $this->aprobacion['montodePago'].' USD')                          
        ->line('correspondiente a la cuota de pago número '.$this->aprobacion['cuotadePago'] . ' de '.$this->aprobacion['mesesaPagar'] )
        ->line('')
        ->line('si estas de acuerdo presiona el siguiente botón.') 
        ->action('Confirmar Deposito de ahorro', url("/saldarCuota" , $this->aprobacion) )
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
