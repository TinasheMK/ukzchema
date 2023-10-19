<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        dd(Member::find("CM003381"));
        return view("pages.about");
    }
}
