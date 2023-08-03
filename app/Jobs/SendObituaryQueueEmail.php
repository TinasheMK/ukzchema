<?php

namespace App\Jobs;

use App\Notifications\ObituaryAddedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Notification;
use Mail;

class SendObituaryQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $members;
    protected $obituary;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($members, $obituary)
    {
        $this->members = $members;
        $this->obituary = $obituary;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($i =0; $i<=$this->members->count(); $i++) {
            try {

                Notification::send($this->members[$i], new ObituaryAddedNotification($this->obituary));


        } catch (\Exception $e) {
            // Log error
            // Flag email for retry
            continue;
        }
        }
    }
}
