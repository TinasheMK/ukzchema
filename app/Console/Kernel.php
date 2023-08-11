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

        // Delete rejected applicants after 24hrs
        $schedule->call(function () {
            DB::table('applicants')->where([
                ['status', '=', 'rejected'],
                ['updated_at', '<=', Carbon::now()->subDay()]
                ])->delete();
        })->everyMinute();


        // Payment Reminders
        $schedule->call(function () {
            try{
                // logger("Reminders Cron running");

                $invoice = Invoice::whereStatus("unpaid")->get();

                for ($y = 0; $y <= $invoice->count() - 1; $y++) {
                    // logger("Invoice processing", [$invoice[$y]]);
                    $datenow    = date("Y-m-d H:i:s");

                    $date    = $invoice[$y]->created_at;

                    $days_ago2 = date('Y-m-d H:i:s', strtotime('+3 days', strtotime( $date)));
                    $days_ago4 = date('Y-m-d H:i:s', strtotime('+4 days', strtotime( $date)));
                    $days_ago7 = date('Y-m-d H:i:s', strtotime('+7 days', strtotime( $date)));
                    $days_ago10 = date('Y-m-d H:i:s', strtotime('+11 days', strtotime( $date)));
                    $member = Member::find($invoice[$y]->member_id);
                    // logger('Member is:', [$member]);
                    if(isset($member) && $member != NULL){
                        if ($days_ago2<=$datenow && $days_ago4>=$datenow && !$invoice[$y]->reminder) {
                            // logger("First reminder for invoice", [$invoice[$y]]);

                            try{
                                $email = Member::find($invoice[$y]->member_id);

                                $invoice[$y]->reminder = 1;
                                $invoice[$y]->save();
                                Notification::send($email, new Reminder1Notification($invoice[$y]->total));
                                // logger("Reminder sent to", [$email->id]);

                            }catch(ErrorException $e){
                                // logger("Member not found", [$email->id]);
                            }
                        }

                        if ($days_ago7 < $datenow && $invoice[$y]->reminder <2) {
                            // logger("Second reminder for invoice", [$invoice[$y]]);

                            try{
                                $email = Member::find($invoice[$y]->member_id);
                                $invoice[$y]->reminder = 2;
                                $invoice[$y]->save();
                                Notification::send($email, new Reminder2Notification($invoice[$y]->total,$days_ago2,$datenow));
                                // logger("Reminder sent to", [$email->id]);
                            }catch(ErrorException $e){
                                // logger("Member not found", [$email->id]);
                            }
                        }
                    }


                }
            }
            catch (Exception $e) {
                logger("Failed to invoice member:", [$e]);
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


