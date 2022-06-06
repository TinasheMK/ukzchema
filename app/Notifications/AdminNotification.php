<?php

namespace App\Notifications;

use App\Models\AdminNotification as ModelsAdminNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;

    protected $notification;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ModelsAdminNotification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
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
            ->subject("Admin Notification")
            ->markdown(
                'mail.admin.email',
                [
                    'action' => "Open Website",
                    'notification' => $this->notification,
                    'link' => route("members-area.home"),
                    'member' => $notifiable
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
            "title" => $this->notification->title,
            "message" => $this->notification->message,
            "admin_id" => $this->notification->by,
        ];
    }
}
