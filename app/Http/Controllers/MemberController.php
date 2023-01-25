<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Obituary;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends SharedBaseController
{

    public function index(){
        $members_count = count(Member::all());
        $obituaries = Obituary::orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        $member = Auth::user()->memberDetails;
        $admin = new Collection([]);
        $payment = new Collection([]);
        $obituary = new Collection([]);
        if (isset($member)) {
            $all = $member->notifications;
            $admin = $this->filterType($all, "admin");
            $payment = $this->filterType($all, "payment");
            $obituary = $this->filterType($all, "obituary");
        }
        return view('member.index',
        compact('members_count',
            'admin',
            'payment',
            'obituary',
            'obituaries'));
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
}
