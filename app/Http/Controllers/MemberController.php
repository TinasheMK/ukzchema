<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Member;
use App\Models\Obituary;
use App\Notifications\TerminationNotification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MemberController extends SharedBaseController
{

    public function index(){
        $members_count = count(Member::all());
        // $obituaries = Obituary::orderBy('created_at', 'desc')
        //     ->limit(3)
        //     ->get();
        $member = Auth::user()->memberDetails;
        $user = User::find(Auth::user()->id);
        $admin = new Collection([]);
        $payment = new Collection([]);
        $obituary = new Collection([]);
        $invoices  = new Collection([]);
        if (isset($member)) {
            $invoices = Invoice::whereMemberId($member->id )->get();
            $all = $member->notifications;
            $admin = $this->filterType($all, "admin");
            $payment = $this->filterType($all, "payment");
            $obituary = $this->filterType($all, "obituary");
        }

        // dd($invoices[0]->obituary);
        return view('member.index',
        compact('members_count',
            'admin',
            'payment',
            'obituary',
            'invoices'));
    }

    private function filterType($notifications, $type)
    {
        return $notifications->filter(function ($notification) use ($type) {
            return notification_type($notification->type) === $type;
        });
    }

    /**
     * Copies the applicant data to a new table {members}
     * and create new user
     */
    public function completeRegistration(Request $request){

    }
    public function store(Request $request)
    {
        return $request->all();
    }

    public function delete(Member $member)
    {

        $member->delete();
        Notification::route('mail', $member->email)->notify(new TerminationNotification($member));

        return back()->with([
            'message'    => 'Successfully deleted member',
            'alert-type' => 'success',
        ]);
    }
}
