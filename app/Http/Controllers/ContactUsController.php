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
        Contact::create($request->all());


        // Mail::send('email',
        // array(
        //     'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        //     'bodyMessage' => $request->get('message')
        // ), function($message)
        // {
        //     $message->from('info@ukzchema.co.uk');

        //     $message->to('info@ukzchema.co.uk', 'UKZ Chema')->subject('UKZ Contect Form');
        // });

        // Notification::send([$request->get('email')], new ContactForm($request));

        Notification::route('mail', "info@ukzchema.co.uk")->notify(new ContactForm($request));

        // event();

        // dd("Wiiiiwiwi");
        return back()->with('success', 'Thank you for contacting us!');



        // return $request->all();
    }
}
