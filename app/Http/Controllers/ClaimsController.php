<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Models\Deposit;
use App\Models\Member;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimsController extends SharedBaseController
{
    public function store(Request $request)
    {
        // dd($request);

        $claim = Claim::create([
            'date' => new DateTime('now'),
            'date_death' => $request->date_death,
            'claimant_fullname' => $request->claimant_fullname,
            'relationship' => $request->relationship,
            'country_death' => $request->country_death,
            'claimant_phone' => $request->claimant_phone,
            'proof_id' => $request->proof_id,
            'air_tickets' => $request->air_tickets,
            'proof_address' => $request->proof_address,
            'passport_date' => $request->passport_date,
            'amount' => $request->amount,
            'claim_verified' => $request->claim_verified,
            'member_fullname' => $request->member_fullname,
            'member_number' => $request->member_number,
            'deceased_name' => $request->deceased_name,

        ]);



        return redirect(route('members-area.claims'))->with([
            'message'    => "Your claim was successfully received.",
            'alert-type' => 'success',
        ]);
    }

    public function index()
    {
        $claims = Claim::whereMemberNumber(Auth::user()->member_id)->get();
        return view('member.claims', compact('claims'));
    }

    public function viewClaim(Claim $claim)
    {
        // dd($claim);
        // $claims = Claim::whereMembershipNumber(Auth::user()->member_id)->get();
        return view('member.claimView', compact('claim'));
    }
    public function claimForm()
    {

        $member = Member::whereUserId(Auth::user()->id)->get();
        $member = $member[0];
        $claims = Claim::whereMemberId(Auth::user()->member_id)->get();
        return view('member.claim', compact('claims', 'member'));
    }
}
