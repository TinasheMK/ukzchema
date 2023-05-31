<?php

namespace App\Http\Controllers;

use App\Events\ApplicantRejected;
// use App\Events\NewApplicant;
use App\Http\Requests\StoreApplicant;
use App\Http\Requests\StoreCompleteRegistration;
use App\Models\Applicant;
use App\Models\Member;
use App\Models\Nominee;
use App\Notifications\NewApplicant;
use App\Notifications\PaymentCompleted;
use App\Notifications\PaymentRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class ApplicantController extends Controller
{
    public function form()
    {
        return view('auth.apply');
    }
    public function checkEmail(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        return ["unique" => !isset($user)];
    }
    public function store(StoreApplicant $request)
    {
        $validated = $request->validated();

        $applicant = Applicant::create($validated);

        logger("Created new applicant");

        $redirect_code = encrypt("{$applicant->id}:{$applicant->email}");

        Notification::route('mail', setting('admin.email', 'support@ukzchema.co.uk'))
            ->notify(new NewApplicant($applicant));

        $route = route("submitted", $redirect_code);

        return compact('route');
    }

    public function submitted($code)
    {
        $applicant_id = null;

        try {
            $identy = decrypt($code);
            $applicant_id = substr($identy, 0, strpos($identy, ":"));
        } catch (\Throwable $th) {
            logger("Someone tried to access success page", [$th->getMessage()]);
            return abort(404);
        }

        $applicant = Applicant::findOrFail($applicant_id);

        logger("Applicant completed registration");

        return view("auth.submitted", compact('applicant'));
    }


    public function joiningForm(Applicant $applicant){
        $member = Member::findByEmail()->get();
        if($member != null){
            return view('pages.joinpaymentexists', ["applicant" => $applicant]);
        }

        return view('pages.joinpayment', ["applicant" => $applicant]);
    }

    public function accept(Request $request)
    {
        if (!isset($request->applicant_id)) return abort(404);
        $applicant = Applicant::findOrFail($request->applicant_id);

        $request = requestPayment($applicant);


        if($request->statusCode !== 201){
            return back()->with([
                'message'    => "Failed to request payment. Please try again",
                'alert-type' => 'error',
            ]);
        }
        $res = (object) $request->result;
        $approve = null;
        foreach ($res->links as $link) {
            if($link->rel === "approve"){
                $approve = $link->href;
            }
        }

        logger("New payment request: ID >> {$res->id} Created @ {$res->create_time}");

        $applicant->notify(new PaymentRequest($approve));
        $applicant->status = "accepted";
        $applicant->token = $res->id;

        $applicant->save();

        return back()->with([
            'message'    => "{$applicant->full_name} was accepted",
            'alert-type' => 'success',
        ]);
    }

    public function acceptPaid(Request $request)
    {
        if (!isset($request->applicant_id)) return abort(404);
        $applicant = Applicant::findOrFail($request->applicant_id);


        $applicant->save();

        // return back()->with([
        //     'message'    => "{$applicant->full_name} was accepted",
        //     'alert-type' => 'success',
        // ]);

        // $applicant = Applicant::whereToken($request->token)->first();
        if (!isset($applicant)) return abort(404);
        $user = User::create([
            'name' => $applicant->full_name,
            'email' =>  $applicant->email,
            'avatar'    => 'users/default.png',
            'password'  =>  bcrypt($request->password)
        ]);
        $user->markEmailAsVerified();

        $member = $user->memberDetails()->create($applicant->toArray());
        $nominees = [];

        foreach ($applicant->nominees as $key => $nominee) {
            array_push($nominees, new Nominee($nominee));
        }
        try {
            $member->nominees()->saveMany($nominees);
            $applicant->delete();
        } catch (\Throwable $th) {
            my_log("failed_to_save_nominees", $th->getMessage());
        }
        return redirect(route('members-area.home'));
    }
    public function deleteusers(){

            Member::whereNotNull('id')->delete();
    }


    public function completeRegForm(Applicant $applicant, Request $request)
    {
        $token = $request->token;

        if(!isset($token)) return abort(404);

        $capture = captureOrder($applicant->token);

        abort_if($capture->statusCode !== 201 && $capture->statusCode !== 422, 500);

        try {
            $res = (object) $capture->result;
            if (!$applicant->welcome_send) {
                $url = $request->fullUrl();
                $applicant->notify(new PaymentCompleted($url, $res->id ?? "0000"));
                $applicant->update(["welcome_send" => true]);
            }
        } catch (\Throwable $th) {}

        return view("auth.complete", ["token" => $applicant->token, "email" => $applicant->email]);
    }

    public function complete(StoreCompleteRegistration $request)
    {
        $applicant = Applicant::whereToken($request->token)->first();
        if (!isset($applicant)) return abort(404);
        $user = User::create([
            'name' => $applicant->full_name,
            'email' =>  $applicant->email,
            'avatar'    => 'users/default.png',
            'password'  =>  bcrypt($request->password)
        ]);
        $user->markEmailAsVerified();

        $member = $user->memberDetails()->create($applicant->toArray());
        $nominees = [];

        foreach ($applicant->nominees as $key => $nominee) {
            array_push($nominees, new Nominee($nominee));
        }
        try {
            $member->nominees()->saveMany($nominees);
            $applicant->delete();
        } catch (\Throwable $th) {
            my_log("failed_to_save_nominees", $th->getMessage());
        }
        return redirect(route('members-area.home'));
    }


    public function joiningfee(Applicant $applicant,Request $request)
    {
        if(!isset($request->payment_ref)){
            return back()->with([
                'message'    => "Failed to validate your payment. Please contact support",
                'alert-type' => 'danger',
            ]);
        }
        $amount = getAmount($request->payment_ref);


        $amount = $amount - 0.31;
        $amount = $amount * 0.971;
        $amount = round($amount, 2);


        if (!isset($applicant)) return abort(404);
        $user = User::create([
            'name' => $applicant->full_name,
            'email' =>  $applicant->email,
            'avatar'    => 'users/default.png',
            'password'  =>  bcrypt($request->password)
        ]);
        $user->markEmailAsVerified();

        $member = $user->memberDetails()->create($applicant->toArray());
        $nominees = [];

        foreach ($applicant->nominees as $key => $nominee) {
            array_push($nominees, new Nominee($nominee));
        }
        try {
            $member->nominees()->saveMany($nominees);
            $applicant->delete();
        } catch (\Throwable $th) {
            my_log("failed_to_save_nominees", $th->getMessage());
        }
        return redirect(route('members-area.home'));

    }



    public function reject(Request $request)
    {
        $applicant = Applicant::find($request->applicant_id);
        if (!isset($applicant)) {
            return ["error" => true, "message" => "Oops something went wrong. Refresh your browser and try again"];
        }

        event(new ApplicantRejected($applicant, $request->rejection_reason));
        $applicant->status = "rejected";
        $applicant->save();
        return [
            "success" => true,
            "message" => "User was rejected successfully",
            "route" => route("voyager.applicants.index")
        ];
    }
}
