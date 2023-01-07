<?php

namespace App\Http\Controllers;

use App\Models\DeceasedNominee;
use App\Models\Nominee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NomineeController extends SharedBaseController
{
    public function index(){
        $nominees = Nominee::whereMemberId(Auth::user()->member_id)->get();
        $can_update = setting('member.can_update_nominees');
        return view('member.nominees', compact('nominees', 'can_update'));
    }

    public function update(Request $request){
        if(!setting('member.can_update_nominees')){
            back()->with([
                "message" => "You cannot update nominees at the moment",
                "level" => "danger"
            ]);
        }
        $request->validate([
            'nominees' => 'required|array'
        ]);
        $member = Auth::user()->memberDetails;
        if (!isset($member)) {
            return back()->with([
                "message" => "Failed to update, make sure your account has profile",
                "level" => "danger"
            ]);
        }

        $saved = [];
        foreach ($request->nominees as $key => $nom) {
            $nominee = Nominee::updateOrCreate([
                'id' => $nom['id'],
                'member_id' => $member->id
            ],$nom);
            array_push($saved, $nominee);
        }
        return back()->with([
            "message" => "Nominees were updated successfully"
        ]);
    }

    public function destroy(Nominee $nominee)
    {
        $nominee->delete();
        return back()->with([
            "message" => "{$nominee->full_name} was successfully deleted",
            "level" => "success"
        ]);
    }

    public function deceased(Request $request)
    {
        if (!isset($request->nominee_id)) return abort(404);
        $nominee = Nominee::findOrFail($request->nominee_id);


        $nominee->deleted_at = date("Y-m-d h:i:sa");
        $nominee->save();

        if (!isset($nominee)) return abort(404);
        $user = DeceasedNominee::create([
            'name' => $nominee->full_name,
            'email' =>  $nominee->email,
            'member_id'=> $nominee->member_id,
            'full_name'=> $nominee->full_name,
            'dob'=> $nominee->dob,
            'dod'=> $nominee->dod,
            'zimbabwean_by'=> $nominee->zimbabwean_by,

        ]);
        // dd($user);


        return redirect(route("voyager.nominees.index"));
    }
}
