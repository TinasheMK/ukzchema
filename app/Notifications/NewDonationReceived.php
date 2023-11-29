<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class NewDonationReceived extends Notification implements ShouldQueue
{
    use Queueable;

    public $order;
    public $donation;
    public $total;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($order, $donation, $total)
    {
        $this->order = $order;
        $this->donation = $donation;
        $this->total = $total;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail', TelegramChannel::class];
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
            ->from(env('MAIL_FROM_ADDRESS'), "UKZ Chema Association Board")
            ->subject("We have received your {$this->order->description}")
            ->markdown(
                'emails.members.paid',
                [
                    'action' => "View My Payments",
                    'link' => route("members-area.payments"),
                    'user' => $notifiable,
                    'order' => $this->order,
                    'payment' => $this->donation,
                ]
            );
    }

    public function toTelegram($notifiable)
    {

        return TelegramMessage::create()
            ->to(env('TELEGRAM_RECEIVER'))
            ->content("New {$this->order->description}.\nPaid By: $notifiable->full_name\nAmount: £{$this->donation->amount}\nTotal Payments: £{$this->total}")
            ->button('Open Admin Area', route('voyager.payments.show', $this->donation->id));
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
            "title" => "Payment: {$this->order->description} ",
            "message" => "We have received your {$this->order->description}",
            "admin_id" => '',
        ];
    }
}
