<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use App\User;
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
        // $user = Auth::user();
        $user = User::find(Auth::user()->id);
        $member = $user->memberDetails;
        if (!isset($member)) {
            my_log("Deposit Received for user ID: {$user->id} {$user->name}", "System couldn't save. Please enter manually\nDeposited Amount: £{$amount}");
            logger("Deposit Received for user ID: {$user->id} {$user->name}" + "System couldn't save. Please enter manually\nDeposited Amount: £{$amount}");
        }else{
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
}
