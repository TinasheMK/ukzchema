<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function form(){
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        //Setup honeypot and send an email to the admin
        return $request->all();
    }
}
