<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateNextOfKin;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NextofKinController extends SharedBaseController
{

    public function index(){
        $member = Member::whereUserId(Auth::id())->first() ?? new Member([]); //for demo account
        $nok = $member->getNextOfKin();
        return view('member.nok', compact('nok'));
    }

    public function update(UpdateNextOfKin $request){
        $member = Auth::user()->memberDetails;
        if(!isset($member)){
            return back()->with([
                "message" => "Admin account cannot update profile",
                "level" => "danger"
            ]);
        }
        $member->update($request->validated());
        return back()->with([
            "message" => "Next of Kin\'s details were updated successfully"
        ]);
    }
}
