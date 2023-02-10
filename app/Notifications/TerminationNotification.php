<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TerminationNotification extends Notification
{
    use Queueable;

    public $member;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        //
        $this->member = $member;
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
                'action' => "Suspended Account",
                'link' => route("splash"),
                'message' => "Your account on UKZ Chema was suspended. Please get in touch with support for more information.",

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
