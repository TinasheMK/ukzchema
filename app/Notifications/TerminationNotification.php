<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TerminationNotification extends Notification
{
    use Queueable;

    public $member;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        //
        $this->member = $member;
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
        ->from("noreply@ukzchema.co.uk", "UKZ Account Termination")
        ->subject("UKZChema Account Termination")
        ->markdown(
            'mail.member.deposit',
            [
                'action' => "Suspended Account",
                'link' => route("splash"),
                'message' => "
Dear Member,\n

We did send you send you two notifications of non-payment first was on the
 third day when the funeral was announced and as per our constitution payment
  should be settled within 72 hours of funeral announcement. Another notification
  was send on the 7th day of non-payment and you have settled the amount you owe for the funeral.\n

We have now terminated your membership with UKZCHEMA because of non-payment as
stipulated in the constitution. If you have any enquiries please email
accounts@ukzchema.co.uk.\n

Best Wishes\n
UKZCHEMA Admin Team
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
