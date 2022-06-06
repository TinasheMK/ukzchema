<?php

namespace App\Providers;

use App\Events\ApplicantAccepted;
use App\Events\ApplicantRejected;
use App\Events\NewApplicant;
use App\Events\ObituaryAdded;
use App\Models\Member;
use App\Notifications\AdminNotification;
use App\Notifications\ApplicantRejected as NotificationsApplicantRejected;
use App\Notifications\NewApplicant as NotificationsNewApplicant;
use App\Notifications\NotifyAcceptedApplicant;
use App\Notifications\ObituaryAddedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use TCG\Voyager\Events\BreadDataAdded;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        // Event::listen(NewApplicant::class, function ($event) {
        //     logger("applicant:applied", ["applicant" => $event->applicant->email]);
        //     Notification::send($event->applicant, new NotificationsNewApplicant());
        // });

        //Applicant Accepted
        Event::listen(ApplicantRejected::class, function ($event) {
            logger("applicant:rejected", ["by" => Auth::user()->name, "applicant" => $event->applicant->email, "orderID" => $event->applicant->orderID]);
            Notification::send($event->applicant, new NotificationsApplicantRejected($event->reason));
        });
        
        //Applicant Accepted
        Event::listen(BreadDataAdded::class, function ($event) {
            $notification = $event->data;
            if(isset($notification->target_group)) {
                logger("new:notification", $notification->toArray());
                $members = target_group($notification->target_group);
                $notification->update(["target_total" => $members->count()]);
                Notification::send($members, new AdminNotification($notification));
            }
        });

        /**
         * Send Notification to all members. Could take a really long time
         * when there are many users so que this up
         */
        Event::listen(ObituaryAdded::class, function ($event) {
            logger("Obituary added event fired", [$event]);
            $members = Member::all();
            Notification::send($members, new ObituaryAddedNotification($event->obituary));
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
