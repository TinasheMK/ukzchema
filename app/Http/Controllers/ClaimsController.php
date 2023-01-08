<?php

namespace App\Http\Controllers;

use App\Claim;
use App\Models\Deposit;
use App\Models\Member;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClaimNotification;



class ClaimsController extends SharedBaseController
{
    public function store(Request $request)
    {
        // dd($request);

        $this->validate($request, [
            'proof_address' => ['required', 'mimes:jpeg,jpg,pdf,gif,bmp,png', 'max:2048'],
            'passport_date' => [ 'mimes:jpeg,jpg,pdf,gif,bmp,png', 'max:2048'],
            'death_certificate' => [ 'mimes:jpeg,jpg,pdf,gif,bmp,png', 'max:2048'],
            'proof_id' => ['required', 'mimes:jpeg,jpg,gif,pdf,bmp,png', 'max:2048'],
            'air_tickets' => [ 'mimes:jpeg,jpg,gif,pdf,bmp,png', 'max:2048'],
        ]);

        $file = $request->file('proof_address');
        $proof_address = time()."_". preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
        $tmp = $file->storeAs('uploads/'.$request->member_number, $proof_address, 'public');

        // dd($proof_address);
        $air_tickets = "";
        $proof_address = "";
        $death_certificate = "";
        $proof_id = "";
        $passport_date = "";

        if($request->file('passport_date')){

            $file = $request->file('passport_date');
            $passport_date = time().$this->generateRandomString()."_". preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
            $tmp = $file->storeAs('uploads/'.$request->member_number, $passport_date, 'public');
        }

        if($request->file('death_certificate')){

            $file = $request->file('death_certificate');
            $death_certificate = time().$this->generateRandomString()."_". preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
            $tmp = $file->storeAs('uploads/'.$request->member_number, $death_certificate, 'public');
        }


        if($request->file('proof_id')){

            $file = $request->file('proof_id');
            $proof_id = time().$this->generateRandomString()."_". preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
            $tmp = $file->storeAs('uploads/'.$request->member_number, $proof_id, 'public');
        }

        if($request->file('air_tickets')){

            $file = $request->file('air_tickets');
            $air_tickets = time().$this->generateRandomString()."_". preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
            $tmp = $file->storeAs('uploads/'.$request->member_number, $air_tickets, 'public');
        }


        $claim = Claim::create([
            'date' => new DateTime('now'),
            'date_death' => $request->date_death,
            'claimant_fullname' => $request->claimant_fullname,
            'relationship' => $request->relationship,
            'country_death' => $request->country_death,
            'claimant_phone' => $request->claimant_phone,
            'proof_id' => $proof_id,
            'air_tickets' => $air_tickets,
            'proof_address' => $proof_address,
            'passport_date' => $passport_date,
            'death_certificate' => $death_certificate,
            'amount' => $request->amount,
            'claim_verified' => $request->claim_verified,
            'member_fullname' => $request->member_fullname,
            'member_number' => $request->member_number,
            'deceased_name' => $request->deceased_name,

        ]);

        Notification::route('mail', "claims@ukzchema.co.uk")->notify(new ClaimNotification($claim));



        return redirect(route('members-area.claims'))->with([
            'message'    => "Your claim was successfully received.",
            'alert-type' => 'success',
        ]);
    }
    public function update(Request $request)
    {
        // dd($request);
        $claim = Claim::find($request->id);


        $this->validate($request, [
            'death_certificate' => ['mimes:jpeg,jpg,pdf,gif,bmp,png', 'max:2048']
        ]);


        if($request->file('death_certificate')){

            $file = $request->file('death_certificate');
            $death_certificate = time().$this->generateRandomString()."_". preg_replace('/\s+/', '_', strtolower($file->getClientOriginalName()));
            $tmp = $file->storeAs('uploads/'.$claim->member_number, $death_certificate, 'public');
        }


        $claim = Claim::find($request->id);
        // dd($claim);

        $claim->death_certificate =
        $death_certificate;
        $claim->save();



        // Notification::route('mail', "claims@ukzchema.co.uk")->notify(new ClaimNotification($claim));



        return redirect(route('members-area.claims'))->with([
            'message'    => "Your claim was updated successfully.",
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



    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
