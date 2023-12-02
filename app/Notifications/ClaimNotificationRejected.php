<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClaimNotificationRejected extends Notification implements ShouldQueue
{
    use Queueable;

    public $claim;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($claim)
    {
        //
        $this->claim = $claim;
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
        ->from("noreply@ukzchema.co.uk", "UKZ Claims")
        ->subject("Claim Rejected")
        ->markdown(
            'mail.member.claim',
            [
                'action' => "View Claim",
                'link' => route("voyager.claims.show", $this->claim->id),
                // 'user' => $notifiable,
                'claimant' => $this->claim->claimant_fullname,
                'message' => "Your claim submitted on {{$this->claim->date}} has been rejected. Reason for rejection is :
                    {{$this->claim->rejection_reason}}. Login to your account for more information.",
                'deceased' => $this->claim->deceased_name
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
