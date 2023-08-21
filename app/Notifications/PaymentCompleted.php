<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class PaymentCompleted extends Notification implements ShouldQueue
{
    use Queueable;

    protected $complete;

    protected $trxn_ref;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $complete, string $trxn_ref)
    {
        $this->complete = $complete;
        $this->trxn_ref = $trxn_ref;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', TelegramChannel::class];
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
        ->subject("Payment Received | Congratulations 🎉🎉")
        ->from("no-reply@ukzchema.com", "UKZ Chema")
        ->markdown('mail.applicants.completed', [
            "applicant" => $notifiable,
            "complete" => $this->complete,
            "trxn_ref" => $this->trxn_ref
        ]);
    }

    public function toTelegram($notifiable)
    {
        logger("Send Telegram");
        $message = "Joining fee payment completed.\nUser: *{$notifiable->full_name}*\nPayment Ref: *#{$this->trxn_ref}*";
        return TelegramMessage::create()
            ->to(env('TELEGRAM_RECEIVER'))
            ->content($message);
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
