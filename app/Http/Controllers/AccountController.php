<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        return view('account.basic');
    }

    public function nextOfKinForm(){
        return view('account.nok'); //next of kin
    }

    public function notificationsForm()
    {
        return view('account.notifications'); //next of kin
    }

    public function changePasswordForm()
    {
        return view('account.cpassword'); //next of kin
    }
}
