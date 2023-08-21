<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Obituary;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObituaryController extends SharedBaseController
{
    public function index()
    {
        $obituaries = Obituary::orderBy('created_at', 'desc')
            ->paginate(10);
        return view("obituaries.index", compact('obituaries'));
    }

    public function show(Obituary $invoice){
        $user = User::find(Auth::user()->id);
        $member = $user->memberDetails;
        $invoice = Invoice::whereMemberIdAndObituaryId($member->id, $invoice->id)->first();
        return view('obituaries.show', compact('invoice'));
    }
}
