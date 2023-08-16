<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Member;
use Illuminate\Http\Request;
use App\User;
use App\Notifications\DepositNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class DepositController extends SharedBaseController
{
    public function store(Request $request)
    {
        if(!isset($request->payment_ref)){
            return back()->with([
                'message'    => "Failed to validate your payment. Please contact support",
                'alert-type' => 'danger',
            ]);
        }
        $amount = getAmount($request->payment_ref);
        // dd($amount);

        $amount = $amount - 0.31;
        $amount = $amount * 0.971;
        $amount = round($amount, 2);
        // $user = Auth::user();
        $user = User::find(Auth::user()->id);
        $member = $user->memberDetails;
        if (!isset($member)) {
            my_log("Deposit Received for user ID: {$user->id} {$user->name}", "System couldn't save. Please enter manually\nDeposited Amount: £{$amount}");
            logger("Deposit Received for user ID: {$user->id} {$user->name} System couldn't save. Please enter manually\nDeposited Amount: £{$amount}");
        }else{
            // dd($amount);
            $user->depositFloat($amount);
            $bal = $user->balanceFloat;
            $member->balance ="$bal";

            $member->deposits()->create([
                "amount" => $amount,
                "payment_ref" => $request->payment_ref,
                "date" => date("D M d, Y G:i"),
                "balance" => $user->balanceFloat,
                "type" => "Deposit",
                "description" => "Paypal deposit by member"

            ]);


            $date = strtotime("+1 week");
            $dueDate = date("D M d, Y G:i", $date);
            $member->save();
            $this->payInvoices($user);
            Notification::route('mail', $member->email)->notify(new DepositNotification($amount));

        }

        return redirect(route('members-area.deposits'))->with([
            'message'    => "Your deposit of £{$amount} was successfully received.",
            'alert-type' => 'success',
        ]);
    }

    public function index()
    {
        $deposits = Deposit::whereMemberId(Auth::user()->member_id)->get();
        return view('member.deposits', compact('deposits'));
    }
    public function manual($member)
    {
        $member = Member::find($member);
        // dd($member);
        return view('vendor.voyager.wallets.read', compact('member'));
    }
    public function manually(Request $request)
    {
        $member = Member::find($request->id);
        $user = User::find($member->user_id);

        if($request->amount>0){
            $user->depositFloat($request->amount);
        }else if($request->amount<0) {
            $user->forceWithdrawFloat(-1*$request->amount, ['description' => 'manual withdrawal by admin']);
        }

        $bal = $user->balanceFloat;
        $member->balance =  "$bal";
        $member->save();

        $member->deposits()->create([
            "amount" => $request->amount,
            "payment_ref" => $request->payment_ref,
            "date" => date("D M d, Y G:i"),
            "balance" => $user->balanceFloat,
            "type" => "Deposit",
            "description" => "Admin deposit for member"
        ]);
        $this->payInvoices($user);

        $redirect = redirect()->route("voyager.members.index");

        return $redirect->with([
            'message'    => __('voyager::generic.successfully_updated')." Deposit. Please wait a minute for transaction to reflect.",
            'alert-type' => 'success',
        ]);
    }

    public function payInvoices(User $user){

        if ($user->balanceFloat >= 0) {
            $invoices = Invoice::whereMemberIdAndStatus($user->member_id, "unpaid")->get();

            for ($x = 0; $x <= $invoices->count() - 1; $x++) {
                $user->memberDetails->donations()->create([
                    "invoice_id" => $invoices[$x]->id,
                    "obituary_id" => $invoices[$x]->obituary->id,
                    "payment_ref" => "Wallet payment",
                    "amount" => $invoices[$x]->total,
                    "description" => $invoices[$x]->description,
                    "on" => now()
                ]);
                $invoices[$x]->status = "paid";
                $invoices[$x]->save();
            }
        }

    }
}
