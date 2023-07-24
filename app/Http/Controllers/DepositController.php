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
            $member->balance = $member->balance + $amount;
            $member->deposits()->create([
                "amount" => $amount,
                "payment_ref" => $request->payment_ref,
                "date" => date("D M d, Y G:i"),
                "balance" => $user->balanceFloat,
                "type" => "Deposit",
                "invoice_id" => $request->payment_ref

            ]);


            $date = strtotime("+1 week");
            $dueDate = date("D M d, Y G:i", $date);

            $invoice = Invoice::create([
                "invoice_date" => date("D M d, Y G:i"),
                "type" => "deposit",
                "subtotal" => $amount,
                "total" => $amount,
                "member_id"=> $member->id,
                "status" => "paid",
                "due_date" => $dueDate,

            ]);
            InvoiceItem::create([
                "title" => "UKZChema Deposit",
                "amount" => $amount,
                "invoice_id"=> $invoice->id
            ]);

            $member->save();
            Notification::route('mail', $member->email)->notify(new DepositNotification($amount));

        }
        // dd($request);

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

        $date = strtotime("+2 week");
        $dueDate = date("D M d, Y G:i", $date);

        $invoice = Invoice::create([
            "invoice_date" => date("D M d, Y G:i"),
            "type" => 'MailPayment',
            "subtotal" => $request->amount,
            "total" => $request->amount,
            "member_id" => $member->id,
            "status" =>'paid',
            "due_date" => $dueDate,
        ]);
        InvoiceItem::create([
            "title" => $member->full_name."Manual Deposit",
            "amount" => $request->amount,
            "invoice_id" => $invoice->id
        ]);


        $redirect = redirect()->route("voyager.members.index");

        return $redirect->with([
            'message'    => __('voyager::generic.successfully_updated')." Deposit. Please wait a minute for transaction to reflect.",
            'alert-type' => 'success',
        ]);
    }
}
