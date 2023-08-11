<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Obituary;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ObituaryController extends SharedBaseController
{
    public function index()
    {
        $obituaries = Obituary::orderBy('created_at', 'desc')
            ->paginate(10);
        return view("obituaries.index", compact('obituaries'));
    }

    public function show(Invoice $invoice){
        return view('obituaries.show', compact('invoice'));
    }
}
