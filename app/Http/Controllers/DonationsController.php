<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Member;
use App\Models\Obituary;
use App\Notifications\NewDonationReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class DonationsController extends SharedBaseController
{
    public function index()
    {
        $donations = Donation::whereMemberId(Auth::user()->member_id)->get();
        $total = $donations->sum('amount');
        $donations = $donations->map(function ($donation) {

            try {
                $member = Member::find($donation->obituary->member_id)
                    ->only(['id', 'first_name', 'middle_names', 'last_name']);
                $donation->user_type = $donation->obituary->user_type;
            } catch (\Throwable $th) {
                logger("Failed to get Member @ DonationsController", [$th->getMessage()]);
                $member = new Member(['id' => null, 'first_name' => "Member Deleted"]);
                $donation->obituary;
                logger($donation->obituary);
                $donation->user_type = "Member Type Deleted";
            }
            $donation->member = $member;
            return $donation;
        });

        return view('member.donations', compact('donations', 'total'));
    }

    public function store(Request $request)
    {
        $client = payPalClient();
        $response = null;
        try {
            $response = $client->execute(new OrdersGetRequest($request->orderID));
        } catch (\Throwable $th) {
            my_log("failed_to_get_donation_amount: Ref {$request->orderID}", [$th->getMessage()]);
            return redirect(route('members-area.payments'))->with([
                'message'    => "Sorry we failed to verify your donation. We have notified the admin to assist",
                'alert-type' => 'danger',
            ]);
        }
        $order = $response->result->purchase_units[0];
        $member = Auth::user()->memberDetails;

        if (!isset($member)) {
            my_log("User doesn't have member's details", "\n\nFailed to save user's donation\nAmount: £{$order->amount->value}\nPayment Ref: *{$request->orderID}*");
            return redirect(route('members-area.payments'))->with([
                'message'    => "We failed to save your donation, but we have notified the admins. We will send you an email once its resolved.",
                'alert-type' => 'danger',
            ]);
        }

        $obituary = Obituary::find($request->obituary_id);
        $obituary->donated_amount = $obituary->donated_amount + $order->amount->value;
        $obituary->save();
        $donation = $member->donations()->create([
            "obituary_id" => $obituary->id,
            "orderID" => $request->orderID,
            "amount" => $order->amount->value,
            "on" => now()
        ]);

        Notification::send($member, new NewDonationReceived($order, $donation, $obituary->donated_amount));

        return redirect(route('members-area.payments'))->with([
            'message'    => "Your donation was successfully received. Thank you!",
            'alert-type' => 'success',
        ]);
    }
}
