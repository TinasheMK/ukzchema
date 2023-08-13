<?php

namespace App\Notifications;

use App\Models\Obituary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ObituaryAddedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $obituary;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Obituary $obituary)
    {
        $this->obituary = $obituary;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail']; //include sms
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
            ->subject("[{$this->obituary->member_type}] {$this->obituary->full_name}'s Obituary was Added")
            ->markdown('mail.obituary.added',
            [
                'action' => "View Obituary",
                'obituary' => $this->obituary,
                'link' => route("members-area.obituary-show", $this->obituary->id),
                'member' => $notifiable
            ]);
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
            "title" => "[{$this->obituary->member_type}] {$this->obituary->full_name}'s Obituary",
            "message" => "Obituary Added for Membership ID: {$this->obituary->member_id}\n Goal Amount: {$this->obituary->goal_amount}\n Member Type: {$this->obituary->member_type} \n\n Biography: {$this->obituary->biography}",
            "admin_id" => Auth::id(),
        ];
    }
}
