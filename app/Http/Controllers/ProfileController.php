<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends SharedBaseController
{
    public function index()
    {
        $profile = Auth::user()->memberDetails ?? new Member([]); //for admins
        // dd($profile);
        return view('member.profile', compact('profile'));
    }

    public function update(UpdateProfile $request){
        $member = Auth::user()->memberDetails;
        if(!isset($member)){
            return back()->with([
                "message" => "Admin account cannot update profile",
                "level" => "danger"
            ]);
        }
        $member->update($request->validated());
        return back()->with([
            "message" => "Profile updated successfully"
        ]);
    }
}
