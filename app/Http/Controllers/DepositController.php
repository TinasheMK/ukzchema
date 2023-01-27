<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
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
                "balance" => $user->balanceFloat(),
                "type" => "deposit",
                "invoice_ref" => $request->payment_ref

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
