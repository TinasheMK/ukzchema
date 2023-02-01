<?php

namespace App\Console;


use App\Models\Donation;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Member;
use App\Models\Obituary;
use App\User;
use Illuminate\Support\Carbon;
use Log;
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

        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            try{
                logger("Obituary Cron running");

                $members = Member::all();
                $obituaries = Obituary::all();
                for ($y = 0; $y <= $obituaries->count() - 1; $y++) {
                    for ($x = 0; $x <= $members->count() - 1; $x++) {

                        $user = User::find($members[$x]->user_id);

                        logger("Obituary Cron running:", [$members[$x]->user_id]  );

                        if ($user ) {
                            $invoiced = Invoice::whereMemberIdAndType($user->member_id, $obituaries[$y]->id)->first();
                            if (!$invoiced) {
                                if ($user->balanceFloat >= $obituaries[$y]->donated_amount) {
                                    $paid_status = "paid";
                                    $donation = $members[$x]->donations()->create([
                                        "obituary_id" => $obituaries[$y]->id,
                                        "orderID" => "wallet",
                                        "amount" => $obituaries[$y]->donated_amount,
                                        "on" => now()
                                    ]);
                                    logger("Donation added for member:", [$members[$x]->id]);

                                } else {
                                    $paid_status = "unpaid";
                                    logger("Insufficient funds for member:", [$members[$x]->id]);

                                }
                                $user->forceWithdrawFloat($obituaries[$y]->donated_amount, ['description' => 'payment for obituary']);
                                $date = strtotime("+2 week");
                                $dueDate = date("D M d, Y G:i", $date);
                                logger("Withdraw for member:", [$obituaries[$y]->id]);

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
                                logger("Invoice created for member:", [$members[$x]->id]);
                            }
                            else{
                                logger("Obituary already invoiced:",  [$invoiced->id] );
                                if ($user->balanceFloat >= $obituaries[$y]->donated_amount) {
                                    $paid_status = "paid";
                                    $user->forceWithdrawFloat($obituaries[$y]->donated_amount, ['description' => 'payment for obituary']);
                                    $donation = $members[$x]->donations()->create([
                                        "obituary_id" => $obituaries[$y]->id,
                                        "orderID" => "wallet",
                                        "amount" => $obituaries[$y]->donated_amount,
                                        "on" => now()
                                    ]);
                                    $invoiced->status = "paid";
                                    logger("Donation added for member:", [$members[$x]->id]);


                                } else {
                                    $paid_status = "unpaid";
                                    logger("Insufficient funds for member:", [$members[$x]->id]);

                                }

                            }

                        } else {
                            // print_r($members[$x]->id);
                            // print_r("<br>");
                            // $x++;
                            logger("Failed to invoice member:", [$members[$x]->user_id]);
                        }



                    }
                }
            }
            catch (Exception $e) {
                // Log::alert($e);
            }
        })->everyMinute();

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


