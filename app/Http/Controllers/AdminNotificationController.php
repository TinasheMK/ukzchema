<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class AdminNotificationController extends VoyagerBaseController
{
    /**
     * Add added by attribute to the request
     * the sending will done in the EventServiceProvider Class
     */
    public function store(Request $request){
        $request->merge(['by' => Auth::id()]);
        return parent::store($request);
    }
}
