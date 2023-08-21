<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $amount;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        //
        $this->amount = $amount;
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
        ->from("noreply@ukzchema.co.uk", "UKZ Deposits")
        ->subject("UKZChema Successful Deposit")
        ->markdown(
            'mail.member.deposit',
            [
                'action' => "View Account",
                'link' => route("splash"),
                'message' => "You successfully deposited £$this->amount. Login to your account for more information.",

            ]
        );
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
