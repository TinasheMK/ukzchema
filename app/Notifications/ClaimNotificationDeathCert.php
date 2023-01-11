<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClaimNotificationDeathCert extends Notification
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
        ->subject("Death Certificate Submitted")
        ->markdown(
            'mail.member.claim',
            [
                'action' => "View Claim",
                'link' => route("voyager.claims.show", $this->claim->id),
                // 'user' => $notifiable,
                'claimant' => $this->claim->claimant_fullname,
                'message' => "A death certificate has been uploaded for claim $this->claim->id.
                Claim submitted on {{$this->claim->date}}. Claimant:{{$this->claim->claimant_fullname}}. Login to for more information.",
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
