<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordEmail extends Notification
{
    use Queueable;

    protected $reset;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($reset)
    {
        $this->reset = $reset;
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
    public function toMail($user)
    {
        if(!$user->exists()){
            return (new MailMessage)
                ->line('Failed to reset UKZ Chema password, no user associated with this email')
                ->action('Join UKZ Chema', route('apply'))
                ->line('If you did not request password reset, no further action is required');

        }

        return (new MailMessage)
                    ->greeting("Hi, {$user->name}")
                    ->line('You are receiving this email because we received a password reset request for your account.')
                    ->action('Reset Password', route('reset.password', $this->reset->token))
                    ->line('If you did not request password reset, no further action is required');
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
