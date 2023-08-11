<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Invoice;
use App\Models\Member;
use App\Models\Obituary;
use App\Notifications\NewDonationReceived;
use App\User;
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

        // dd($member);
        // $obituary = Obituary::find($request->obituary_id);

        $user = User::find(Auth::user()->id);

        $amount = $order->amount->value;
        $amount = $amount - 0.31;
        $amount = $amount * 0.971;
        $amount = round($amount, 2);

        $user->depositFloat($request->amount);


        // Mark invoice paid and make donation
        $invoice = Invoice::find($request->invoice_id);


        $donation = $user->memberDetails->donations()->create([
            "invoice_id" => $invoice->id,
            "obituary_id" => $invoice->obituary->id,
            "orderID" => $request->orderID,
            "payment_ref" => "Wallet payment",
            "amount" => $invoice->total,
            "description" => $invoice->description,
            "on" => now()
        ]);
        $invoice->status = "paid";
        $invoice->save();






        // Notification::send($member, new NewDonationReceived($order, $donation, $invoice->amount));

        return redirect(route('members-area.payments'))->with([
            'message'    => "Your donation was successfully received. Thank you!",
            'alert-type' => 'success',
        ]);
    }
}
