<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TerminationNotification extends Notification implements ShouldQueue
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
Dear member
\n
Account Terminated
\n
Your account has been terminated. We are really sorry to see to see you go but thank you for your time with us.
\n
Having second thoughts?
If you would like to be still part of the Association or you have other questions about your membership please contact us on https://www.ukzchema.co.uk/contact-us or send us an email on Admin@ukzchema.co.uk
\n
Best wishes \n
Admin Team\n
UKZ Chema Association",

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
