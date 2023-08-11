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

                if($this->obituary->member_id==$this->members[$i]->id){
                    continue;
                };

                $user = User::find($this->members[$i]->user_id);

                // Invoice member
                $user->forceWithdrawFloat($this->obituary->donated_amount, ['description' => 'Payment for obituary']);
                // logger("Withdraw for member on obituary:", [$obituaries[$y]->id]);
                $date = strtotime("+3 days");
                $dueDate = date("D M d, Y G:i", $date);
                $paid_status = "unpaid";


                if ($user->balanceFloat >= 0) {
                    $paid_status = "paid";
                }

                $invoice = Invoice::create([
                    "invoice_date" => date("D M d, Y G:i"),
                    "type" => "Obituary",
                    "description" => "Obituary for (".strval($this->obituary->member_id) .") ". strval($this->obituary->full_name),
                    "subtotal" => $this->obituary->donated_amount,
                    "obituary_id" => $this->obituary->id,
                    "total" => $this->obituary->donated_amount,
                    "member_id" => $this->members[$i]->id,
                    "status" => $paid_status,
                    "due_date" => $dueDate,
                ]);

                InvoiceItem::create([
                    "title" => $this->obituary->full_name,
                    "amount" => $this->obituary->donated_amount,
                    "invoice_id" => $invoice->id
                ]);

                // Notification::send($this->members[$i], new ObituaryAddedNotification($this->obituary));

        } catch (\Exception $e) {
            $this->obituary->unBilledMembers()->attach($this->members[$i]->id);
            logger($e);
            continue;
        }
        }
    }
}
