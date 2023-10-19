<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $f_name =   '';
        $l_name =   '';

        $prefix = strtoupper($l_name . $f_name);
        $prefix2 = "CM";

        $counter = Member::count();
        $padded = 0;
        $member_id = null;

        do {
            $counter++;
            $padded = str_pad($counter, 6, '0', STR_PAD_LEFT);
            $member_id = $prefix2 . $padded;
        } while (Member::find($member_id) != null);

        dd(Member::find($member_id));
        return view("pages.about");
    }
}
