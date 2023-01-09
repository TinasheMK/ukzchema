<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Notifications\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;



class ContactUsController extends Controller
{
    public function form(){
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        //Setup honeypot and send an email to the admin

        $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
        Contact::create([
            'name' => $request->name,
            'email'=> $request->email,
            'message' => $request->message]
        );

        // dd("Wiiiiwiwi");


        Notification::route('mail', "info@ukzchema.co.uk")->notify(new ContactForm($request));

        // event();

        return back()->with('success', 'Thank you for contacting us!');



        // return $request->all();
    }
}
