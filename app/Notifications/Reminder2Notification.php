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
    public $reminder_date;
    public $suspension_date;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount, $reminder_date, $suspension_date)
    {
        //
        $this->amount = $amount;
        $this->suspension_date = $suspension_date;
        $this->reminder_date = $reminder_date;
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
        ->from("noreply@ukzchema.co.uk", "UKZ Payment Reminder")
        ->subject("UKZChema Payment Reminder")
        ->markdown(
            'mail.member.deposit',
            [
                'action' => "View Account",
                'link' => route("splash"),
                'message' => "

                Dear member

                A payment of £"+$this->amount+" is still pending after reminder sent on"+$this->reminder_date+"

                Please settle outstanding amount at your earliest.
                >>If you do not wish to continue with your membership, please just ignore this nofication.
                >>If you want to avoid termination, please make a payment within the next 72 hours.
                Please do not hesitate to contact us on accounts@ukzchema.co.uk with any further questions.

                Best wishes
                Admin Team
                UKZ Chema Association
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
