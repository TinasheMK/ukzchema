<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class PaymentRequest extends Notification implements ShouldQueue
{
    use Queueable;

    protected $approve;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $approve)
    {
        $this->approve = $approve;
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
        ->subject("Welcome Aboard 🤗| UKZ Chema")
        ->from("no-reply@ukzchema.com", "UKZ Chema")
        ->markdown('mail.applicants.request', [
            "applicant" => $notifiable,
            "approve" => $this->approve
        ]);
    }

    public function toTelegram($notifiable)
    {
        $admin = Auth::user();
        $message = "Board Member *({$admin->name})* accepted applicant *{$notifiable->full_name}*";
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
