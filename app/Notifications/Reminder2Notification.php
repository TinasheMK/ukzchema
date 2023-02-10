<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Reminder2Notification extends Notification
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
                'message' => "

                Dear member
                Account suspended
                A payment of £{$amount} is still pending after reminder sent on {$reminder_date}
                Your account has been suspended since {$suspension_date} and is going to be terminated in 3 days.
                Please settle outstanding amount at your earliest.
                >>If you do not wish to continue with your membership, please just ignore this nofication.
                >>If you want to avoid termination, please make a payment within the next 72 hours.
                Please do not hesitate to contact us on accounts@ukzchema.co.uk with any further questions.

                Best wishes
                Admin Team
                UKZ Chema Association
                ",

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
