<?php

namespace App\Jobs;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Notifications\ObituaryAddedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Facades\Notification;
use Mail;

class BillAndNotifyObituary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $member;
    protected $obituary;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($member, $obituary)
    {
        $this->member = $member;
        $this->obituary = $obituary;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            try {

                if($this->obituary->member_id!=$this->member->id){


                $user = User::find($this->member->user_id);
                $donateAmount = $this->obituary->donated_amount;
                if(isset($this->member->boardMember)){
                    $donateAmount = 0;
                }

                // Invoice member
                $user->forceWithdrawFloat($donateAmount, ['description' => 'Payment for obituary']);
                logger("Invoice job version 45. On obituary", [$this->obituary->id]);
                $date = strtotime("+3 days");
                $dueDate = date("D M d, Y G:i", $date);
                $paid_status = "unpaid";


                if ($user->balanceFloat >= 0) {
                    $paid_status = "paid";
                }

                $invoice = Invoice::create([
                    "invoice_date" => date("D M d, Y G:i"),
                    "type" => "Obituary",
                    "description" => "Obituary for ". strval($this->obituary->full_name),
                    "subtotal" => $donateAmount,
                    "obituary_id" => $this->obituary->id,
                    "total" => $donateAmount,
                    "member_id" => $this->member->id,
                    "status" => $paid_status,
                    "due_date" => $dueDate,
                ]);

                InvoiceItem::create([
                    "title" => $this->obituary->full_name,
                    "amount" => $donateAmount,
                    "invoice_id" => $invoice->id
                ]);

            };

        } catch (\Exception $e) {
            $this->obituary->unBilledMembers()->attach($this->member->id);
            logger($e);
            // continue;
        }
        }
    // }
}
