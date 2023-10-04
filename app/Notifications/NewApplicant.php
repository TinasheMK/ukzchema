<?php

namespace App\Notifications;

use App\Models\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class NewApplicant extends Notification implements ShouldQueue
{

    public $applicant;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', TelegramChannel::class,];
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
                    ->subject('New Applicant')
                    ->line("New user {$this->applicant->full_name} has just applied.")
                    ->action('Open Admin Area', route('voyager.applicants.show', $this->applicant->id))
                    ->line('Auto Generated Mail!');
    }

    public function toTelegram($notifiable)
    {

        $message = "New user {$this->applicant->full_name} has just applied.";

        return TelegramMessage::create()
            ->to(env('TELEGRAM_RECEIVER'))
            ->content("{$message}\nReview the applicant and request payment")
            ->button('Open Member Dashboard', route('voyager.applicants.show', $this->applicant->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $notifiable->toArray();
    }
}
