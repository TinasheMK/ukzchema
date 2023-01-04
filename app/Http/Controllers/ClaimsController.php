<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimsController extends SharedBaseController
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
        $user = Auth::user();
        $member = $user->memberDetails;
        if (!isset($member)) {
            my_log("Deposit Received for user ID: {$user->id} {$user->name}", "System couldn't save. Please enter manually\nDeposited Amount: £{$amount}");
            logger("Deposit Received for user ID: {$user->id} {$user->name}" + "System couldn't save. Please enter manually\nDeposited Amount: £{$amount}");
        }else{
            $member->balance = $member->balance + $amount;
            $member->deposits()->create([
                "amount" => $amount,
                "payment_ref" => $request->payment_ref,
                "date" => date("D M d, Y G:i")
            ]);
            $member->save();
        }
        return redirect(route('members-area.claims'))->with([
            'message'    => "Your deposit of £{$amount} was successfully received.",
            'alert-type' => 'success',
        ]);
    }

    public function index()
    {
        $claims = Claim::whereMembershipNumber(Auth::user()->member_id)->get();
        return view('member.claims', compact('claims'));
    }
    public function claimForm()
    {
        $claims = Claim::whereMemberId(Auth::user()->member_id)->get();
        return view('member.claim', compact('claims'));
    }
}
