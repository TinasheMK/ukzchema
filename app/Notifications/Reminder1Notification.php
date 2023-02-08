<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Remider1Notification extends Notification
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
                Reminder of payment due.
                A payment of £….. is still pending after funeral announcement made 72 hours ago.
                We wish to highlight the urgency of this issue as per our constitution.
                Please settle outstanding amount at your earliest
                We look forward to receiving your payment receipt in order to avoid suspension.
                Please do not hesitate to email accounts@ukzchema.co.uk with any further questions.
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
