<?php

namespace App\Console;


use App\Models\BoardMember;
use App\Models\Donation;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Member;
use App\Models\Obituary;
use App\Notifications\Reminder1Notification;
use App\Notifications\Reminder2Notification;
use App\Notifications\TerminationNotification;
use App\User;
use ErrorException;
use Illuminate\Support\Carbon;
use Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use TheSeer\Tokenizer\Exception;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            DB::table('applicants')->where([
                ['status', '=', 'rejected'],
                ['updated_at', '<=', Carbon::now()->subDay()]
                ])->delete();
        })->everyMinute();


        // Update member balance on user balance cron
        $schedule->call(function () {
            // logger("User balance Cron running:");
            $this->billBoardMembers();


            $users = User::all();
            for ($x = 0; $x <= $users->count() - 1; $x++) {
                $member = $users[$x]->memberDetails;
                if($member){
                    $bal = $users[$x]->balanceFloat;
                    $member->balance =  "$bal";
                    // logger( $member->balance );
                    $member->save();
                    // logger("Balance updated user:", [$users[$x]->id]  );
                }else{
                    // logger("User balance update failed:", [$users[$x]->id]  );
                }
            }
        })->everyMinute();



        // Billing of orbituaries cron
        $schedule->call(function () {
            try{
                logger("Obituary Cron running");
                $members = Member::all();
                $obituaries = Obituary::all();
                for ($y = 0; $y <= $obituaries->count() - 1; $y++) {
                    for ($x = 0; $x <= $members->count() - 1; $x++) {

                        $user = User::find($members[$x]->user_id);

                        logger("Obituary Cron running:", [$members[$x]->id]  );

                        if ($user ) {
                            $invoiced = Invoice::whereMemberIdAndType($user->member_id, $obituaries[$y]->id)->first();
                            // Create invoice for an obituary for this member
                            // otherwise if invoice exists and is unpaid
                            // check balance and pay if sufficient funds
                            if (!$invoiced) {
                                if ($user->balanceFloat >= $obituaries[$y]->donated_amount) {
                                    $paid_status = "paid";
                                    $donation = $members[$x]->donations()->create([
                                        "obituary_id" => $obituaries[$y]->id,
                                        "orderID" => "wallet",
                                        "amount" => $obituaries[$y]->donated_amount,
                                        "on" => now()
                                    ]);
                                    // logger("New invoice to be created and Donation added for member:", [$members[$x]->id]);
                                    // logger("Obituary is:", [$obituaries[$y]->id]);

                                } else {
                                    $paid_status = "unpaid";
                                    // logger("Insufficient funds for member:", [$members[$x]->id]);
                                }

                                $user->forceWithdrawFloat($obituaries[$y]->donated_amount, ['description' => 'payment for obituary']);
                                // logger("Withdraw for member on obituary:", [$obituaries[$y]->id]);
                                $date = strtotime("+3 days");
                                $dueDate = date("D M d, Y G:i", $date);

                                $invoice = Invoice::create([
                                    "invoice_date" => date("D M d, Y G:i"),
                                    "type" => $obituaries[$y]->id,
                                    "subtotal" => $obituaries[$y]->donated_amount,
                                    "total" => $obituaries[$y]->donated_amount,
                                    "member_id" => $members[$x]->id,
                                    "status" => $paid_status,
                                    "due_date" => $dueDate,
                                ]);
                                InvoiceItem::create([
                                    "title" => $obituaries[$y]->full_name,
                                    "amount" => $obituaries[$y]->donated_amount,
                                    "invoice_id" => $invoice->id
                                ]);
                                // logger("Invoice created for member:", [$members[$x]->id]);
                            }
                            else{
                                if ($invoiced->status != "paid") {
                                    logger("Obituary already invoiced:", [$invoiced->id]);
                                    if ($user->balanceFloat >= $obituaries[$y]->donated_amount) {
                                        // if (!$obituaries[$y]->hasPaidId($members[$x]->id)) {
                                            $paid_status = "paid";
                                            $donation = $members[$x]->donations()->create([
                                                "obituary_id" => $obituaries[$y]->id,
                                                "orderID" => "wallet",
                                                "amount" => $obituaries[$y]->donated_amount,
                                                "on" => now()
                                            ]);
                                            $invoiced->status = "paid";
                                            $invoiced->save();
                                            logger("Donation added for member:", [$members[$x]->id]);
                                        // }
                                    } else {
                                        $hasPaid = Donation::whereMemberIdAndObituaryId($user->member_id, $obituaries[$y]->id)->first();
                                        if(isset($hasPaid)){
                                            $paid_status = "paid";
                                            $donation = $members[$x]->donations()->create([
                                                "obituary_id" => $obituaries[$y]->id,
                                                "orderID" => "wallet",
                                                "amount" => $obituaries[$y]->donated_amount,
                                                "on" => now()
                                            ]);
                                            $invoiced->status = "paid";
                                            $invoiced->save();
                                        }else{
                                            $paid_status = "unpaid";
                                        }
                                        // logger("Insufficient funds for member:", [$members[$x]->id]);
                                    }
                                }else{
                                    $hasPaid = Donation::whereMemberIdAndObituaryId($user->member_id, $obituaries[$y]->id)->first();
                                    if(!isset($hasPaid)) {

                                        $paid_status = "paid";
                                        $donation = $members[$x]->donations()->create([
                                            "obituary_id" => $obituaries[$y]->id,
                                            "orderID" => "wallet",
                                            "amount" => $obituaries[$y]->donated_amount,
                                            "on" => now()
                                        ]);
                                    }
                                    logger("Member already paid obituary:", [$obituaries[$y]->id]);
                                    // logger("Orbituary status",$hasPaid->id );
                                }
                            }

                        } else {
                            logger("Failed to invoice member:", [$members[$x]->user_id]);
                        }
                    }
                }
            }
            catch (Exception $e) {
                // Log::alert($e);
            }
        })->everyMinute();


        // Reminders
        $schedule->call(function () {
            try{
                logger("Reminders Cron running");
                // Notification::route('mail', 'tinashekmakarudze@gmail.com')->notify(new Reminder1Notification("30"));

                // logger("Email sent");


                $invoice = Invoice::whereStatus("unpaid")->get();

                for ($y = 0; $y <= $invoice->count() - 1; $y++) {
                    // logger("Invoice processing", [$invoice[$y]]);
                    $datenow    = date("Y-m-d H:i:s");

                    $date    = $invoice[$y]->created_at;

                    $days_ago2 = date('Y-m-d H:i:s', strtotime('+3 days', strtotime( $date)));
                    $days_ago4 = date('Y-m-d H:i:s', strtotime('+4 days', strtotime( $date)));
                    $days_ago7 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime( $date)));
                    $days_ago10 = date('Y-m-d H:i:s', strtotime('+11 days', strtotime( $date)));

                    // logger("date now", [$datenow]);
                    // logger("date", [$date]);
                    // logger("due 2 ", [ $days_ago2]);
                    // logger("due 4 ", [ $days_ago4]);
                    // logger("due 7 ", [ $days_ago7]);
                    // logger("due 10 ", [ $days_ago10]);
                    $member = Member::find($invoice[$y]->member_id);
                    // logger('Member is:', [$member]);
                    if(isset($member) && $member != NULL){
                        if ($days_ago2<=$datenow && $days_ago4>=$datenow && !$invoice[$y]->reminder) {
                            logger("First reminder for invoice", [$invoice[$y]]);

                            try{
                                $email = Member::find($invoice[$y]->member_id);

                                $invoice[$y]->reminder = 1;
                                $invoice[$y]->save();
                                Notification::send($email, new Reminder1Notification($invoice[$y]->total));
                                logger("Reminder sent to", [$email->id]);

                            }catch(ErrorException $e){
                                logger("Member not found", [$email->id]);
                            }
                        }

                        if ($days_ago7 < $datenow && $invoice[$y]->reminder <2) {
                            logger("Second reminder for invoice", [$invoice[$y]]);

                            try{
                                $email = Member::find($invoice[$y]->member_id);
                                $invoice[$y]->reminder = 2;
                                $invoice[$y]->save();
                                Notification::send($email, new Reminder2Notification($invoice[$y]->total,$days_ago2,$datenow));
                                logger("Reminder sent to", [$email->id]);
                            }catch(ErrorException $e){
                                logger("Member not found", [$email->id]);
                            }
                        }
                    }


                }
            }
            catch (Exception $e) {
                logger("Failed to invoice member:", [$e]);
            }
        })->everyMinute();



        // ////TErminate unpaid members
        // $schedule->call(function () {
        //     try{
        //         logger("Termination Cron running");
        //         // Notification::route('mail', 'tinashekmakarudze@gmail.com')->notify(new Reminder1Notification("30"));



        //         $invoice = Invoice::whereStatus("unpaid")->get();

        //         for ($y = 0; $y <= $invoice->count() - 1; $y++) {
        //             // logger("Invoice processing", [$invoice[$y]]);
        //             $datenow    = date("Y-m-d H:i:s");

        //             $date    = $invoice[$y]->created_at;

        //             $days_ago2 = date('Y-m-d H:i:s', strtotime('+3 days', strtotime( $date)));
        //             $days_ago4 = date('Y-m-d H:i:s', strtotime('+4 days', strtotime( $date)));
        //             $days_ago7 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime( $date)));
        //             $days_ago10 = date('Y-m-d H:i:s', strtotime('+11 days', strtotime( $date)));

        //             // logger("date now", [$datenow]);
        //             // logger("date", [$date]);
        //             // logger("due 2 ", [ $days_ago2]);
        //             // logger("due 4 ", [ $days_ago4]);
        //             // logger("due 7 ", [ $days_ago7]);
        //             // logger("due 10 ", [ $days_ago10]);

        //             $member = Member::find($invoice[$y]->member_id);
        //             // logger('Member is:', [$member]);
        //             if(isset($member) && $member != NULL){

        //                 if ($days_ago10 < $datenow) {
        //                     logger("Termination for member", [$invoice[$y]]);

        //                     try{
        //                         $invoice[$y]->reminder = 3;
        //                         $invoice[$y]->save();
        //                         $member = Member::find($invoice[$y]->member_id);
        //                         Notification::send($member, new TerminationNotification($member));
        //                         $member->delete();
        //                         logger("Member terminated", [$member->id]);
        //                     }catch(ErrorException $e){
        //                         logger("Member not found", [$member->id]);
        //                     }
        //                 }
        //             }

        //         }
        //     }
        //     catch (Exception $e) {
        //         logger("Failed to invoice member:", [$e]);
        //     }
        // })->everyMinute();



    }

    public function billBoardMembers(){
        $members = BoardMember::all();
        $obituaries = Obituary::all();
        for ($y = 0; $y <= $obituaries->count() - 1; $y++) {
            for ($x = 0; $x <= $members->count() - 1; $x++) {

                $user = User::find($members[$x]->member->user_id);

                // logger("Obituary Cron running:", [$members[$x]->user_id]  );

                if ($user ) {
                    $invoiced = Invoice::whereMemberIdAndType($user->member_id, $obituaries[$y]->id)->first();

                    if (!$invoiced) {
                        $donation = $members[$x]->member->donations()->create([
                            "obituary_id" => $obituaries[$y]->id,
                            "orderID" => "wallet",
                            "amount" => 0,
                            "on" => now()
                        ]);

                        $date = strtotime("+3 days");
                        $dueDate = date("D M d, Y G:i", $date);

                        $invoice = Invoice::create([
                            "invoice_date" => date("D M d, Y G:i"),
                            "type" => $obituaries[$y]->id,
                            "subtotal" => 0,
                            "total" => 0,
                            "member_id" => $members[$x]->member->id,
                            "status" => "paid",
                            "due_date" => $dueDate,
                        ]);
                        InvoiceItem::create([
                            "title" => $obituaries[$y]->full_name,
                            "amount" => 0,
                            "invoice_id" => $invoice->id
                        ]);
                    }
                }



            }
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }


}


