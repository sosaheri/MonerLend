<?php
namespace App\Notifications;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
class UserRegisteredSuccessfully extends Notification
{
    use Queueable;
    /**
     * @var User
     */
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        /** @var User $user */
        $user = $this->user;
        return (new MailMessage)
            //->from(env('ADMIN_MAIL'))
            ->from('info@monerlend.com')
            ->subject('Creo su cuenta exitosamente')
            ->greeting(sprintf('Hola %s', $user->name))
            ->line('Te has registrado exitosamente en nuestro sistema. Por favor activa tu cuenta.')
            ->action('Haz Click aquí', route('activate.user', $user->activation_code))
            ->line('Gracias por unirte a nuestra comunidad!');
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