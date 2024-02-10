<?php

namespace App\Console;


use App\Models\BoardMember;
use App\Models\Donation;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Member;
use App\Models\Obituary;
use App\Notifications\ObituaryAddedNotification;
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

        // Delete rejected applicants after 24hrs
        $schedule->call(function () {
            DB::table('applicants')->where([
                ['status', '=', 'rejected'],
                ['updated_at', '<=', Carbon::now()->subDay()]
                ])->delete();
        })->everyMinute();


        // Payment Reminders
        // $schedule->call(function () {
        //     try{
        //         // logger("Reminders Cron running");

        //         $invoice = Invoice::whereStatus("unpaid")->get();

        //         for ($y = 0; $y <= $invoice->count() - 1; $y++) {
        //             // logger("Invoice processing", [$invoice[$y]]);
        //             $datenow    = date("Y-m-d H:i:s");

        //             $date    = $invoice[$y]->created_at;

        //             $days_ago2 = date('Y-m-d H:i:s', strtotime('+3 days', strtotime( $date)));
        //             $days_ago4 = date('Y-m-d H:i:s', strtotime('+4 days', strtotime( $date)));
        //             $days_ago7 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime( $date)));
        //             $days_ago10 = date('Y-m-d H:i:s', strtotime('+11 days', strtotime( $date)));
        //             $member = Member::find($invoice[$y]->member_id);
        //             // logger('Member is:', [$member]);
        //             if(isset($member) && $member != NULL){
        //                 if ($days_ago2<=$datenow && $days_ago4>=$datenow && !$invoice[$y]->reminder) {
        //                     // logger("First reminder for invoice", [$invoice[$y]]);

        //                     try{
        //                         $email = Member::find($invoice[$y]->member_id);

        //                         $invoice[$y]->reminder = 1;
        //                         $invoice[$y]->save();
        //                         Notification::send($email, new Reminder1Notification($invoice[$y]->total));
        //                         // logger("Reminder sent to", [$email->id]);

        //                     }catch(ErrorException $e){
        //                         // logger("Member not found", [$email->id]);
        //                     }
        //                 }

        //                 if ($days_ago7 < $datenow && $invoice[$y]->reminder <2) {
        //                     // logger("Second reminder for invoice", [$invoice[$y]]);

        //                     try{
        //                         $email = Member::find($invoice[$y]->member_id);
        //                         $invoice[$y]->reminder = 2;
        //                         $invoice[$y]->save();
        //                         Notification::send($email, new Reminder2Notification($invoice[$y]->total,$days_ago2,$datenow));
        //                         // logger("Reminder sent to", [$email->id]);
        //                     }catch(ErrorException $e){
        //                         // logger("Member not found", [$email->id]);
        //                     }
        //                 }
        //             }


        //         }
        //     }
        //     catch (Exception $e) {
        //         logger("Failed to invoice member:", [$e]);
        //     }
        // })->everyMinute();


        // Bill unBilled members for obituary
        $schedule->call(function () {
            // find obituary from 3 days \AddGroupToSettingsTable
            $obituaries = Obituary::whereDate('created_at','>',Carbon::today()->subDays(3))->get();
            logger($obituaries->count());
            // logger('Obituaries cron running');
            // Find all Members
            $members = Member::all();
            logger($members->count());
            // For each member check that invoice with obituary id exists
            for ($y = 0; $y <= $obituaries->count() - 1; $y++) {
                // logger('Inside loop');

                    for ($x = 0; $x <= $members->count() - 1; $x++) {

                        try{
                            // logger($members[$x]->user_id);

                            $user = $members[$x]->user;



                            // $user = User::find($members[$x]->user_id);

                            // logger("User found:", [$user[$x]] );
                            // logger("Obituary", [$obituaries[$y]->id] );

                            if ($user && $user->created_at < $obituaries[$y]->created_at) {
                                $invoiced = Invoice::whereMemberIdAndObituaryId($members[$x]->id, $obituaries[$y]->id)->first();

                                if (!$invoiced) {
                                    logger("Creating invoice for user.", [$members[$x]->user_id]);
                                    try {

                                        if($obituaries[$y]->member_id!=$members[$x]->id){


                                        $user = User::find($members[$x]->user_id);
                                        $donateAmount = $obituaries[$y]->donated_amount;
                                        if(isset($members[$x]->boardMember)){
                                            $donateAmount = 0;
                                        }

                                        // Invoice member
                                        $user->forceWithdrawFloat($donateAmount, ['description' => 'Payment for obituary']);
                                        logger("Withdrawal for obituary complete.", [$user->id]);
                                        $date = strtotime("+3 days");
                                        $dueDate = date("D M d, Y G:i", $date);
                                        $paid_status = "unpaid";


                                        if ($user->balanceFloat >= 0) {
                                            $paid_status = "paid";
                                        }

                                        $invoice = Invoice::create([
                                            "invoice_date" => date("D M d, Y G:i"),
                                            "type" => "Obituary",
                                            "description" => "Obituary for ". strval($obituaries[$y]->full_name),
                                            "subtotal" => $donateAmount,
                                            "obituary_id" => $obituaries[$y]->id,
                                            "total" => $donateAmount,
                                            "member_id" => $members[$x]->id,
                                            "status" => $paid_status,
                                            "due_date" => $dueDate,
                                        ]);

                                        InvoiceItem::create([
                                            "title" => $obituaries[$y]->full_name,
                                            "amount" => $donateAmount,
                                            "invoice_id" => $invoice->id
                                        ]);

                                        logger('Invoice created');



                                    };

                                } catch (\Exception $e) {
                                    $obituaries[$y]->unBilledMembers()->attach($members[$x]->id);
                                    logger('An error occured');
                                    logger($members[$x]->user_id);
                                    logger($e);
                                    // continue;
                                }
                                }else{
                                    // logger('Inside another loop');
                                    // logger($x);
                                    // logger($invoiced->id);
                                }

                            } else {
                                logger("Failed to invoice member:", [$members[$x]->user_id]);
                            }

                        } catch (\Exception $e) {
                            // $obituaries[$y]->unBilledMembers()->attach($members[$x]->id);
                            logger('An error occured');
                            logger($e);
                            // continue;
                        }
                    }

            }
        })->everyMinute();


        // // Terminate unpaid members after certain days
        // $schedule->call(function () {
        //     try{
        //         logger("Termination Cron running");


        //         $invoice = Invoice::whereStatus("unpaid")->get();

        //         for ($y = 0; $y <= $invoice->count() - 1; $y++) {
        //             // logger("Invoice processing", [$invoice[$y]]);
        //             $datenow    = date("Y-m-d H:i:s");

        //             $date    = $invoice[$y]->created_at;

        //             $days_ago2 = date('Y-m-d H:i:s', strtotime('+3 days', strtotime( $date)));
        //             $days_ago4 = date('Y-m-d H:i:s', strtotime('+4 days', strtotime( $date)));
        //             $days_ago7 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime( $date)));
        //             $days_ago10 = date('Y-m-d H:i:s', strtotime('+11 days', strtotime( $date)));

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


