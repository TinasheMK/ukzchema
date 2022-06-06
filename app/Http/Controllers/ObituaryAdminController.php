<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Nominee;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ObituaryAdminController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $added = $this->addFullName($request);
        if(!is_bool($added) ){
            return $added;
        }
        return parent::store($request);
    }

    public function addFullName($request){
        $member = Member::find($request->member_id);
        if (!isset($member)) {
            return back()
                ->withInput()
                ->with([
                    'message'    => "Membership ID is required",
                    'alert-type' => 'error',
                ]);
        }
        $full_name = null;
        $dob = null;
        switch ($request->member_type) {
            case 'nominee':
                $nominee = $member->nominees()->find($request->nominee_id);
                if (!isset($nominee)) {
                    return back()
                        ->withInput()
                        ->with([
                            'message'    => $request->nominee_id ? "Selected nominee is not on member's nominees list"  : "Please select deceased nominee",
                            'alert-type' => 'error',
                        ]);
                }
                $full_name = $nominee->full_name;
                $dob = $nominee->dob;

                $nominee->toDeceased();
                break;
            case 'member':
                //delete cascade
                $full_name = $member->full_name;
                $dob = $member->dob;
                $member->toDeceased();
                break;
            // case 'nok':
            //     $full_name = $member->nok_full_name;
            //     $dob = $member->nok_dob;
            //     $nok = new Nominee((array)$member->getNextOfKin());
            //     $member->nok_city = null;
            //     $member->nok_country = null;
            //     $member->nok_dob = null;
            //     $member->nok_email = null;
            //     $member->nok_full_name = null;
            //     $member->nok_phone = null;
            //     $member->nok_street = null;
            //     $member->nok_zip = null;
            //     $nok->save();
            //     $member->save();
            //     break;
            default:
                # code...
                break;
        }
        if (!isset($full_name)) {
            return back()
                ->withInput()
                ->with([
                    'message'    => "Select Member Type",
                    'alert-type' => 'error',
                ]);
        }

        $request->merge(compact('full_name', 'dob'));
        return true;
    }
}
