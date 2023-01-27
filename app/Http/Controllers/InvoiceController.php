<?php

namespace App\Http\Controllers;

use App\Models\Constitution;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $constitution = Constitution::first();
        return view('pages.invoice.invoice', compact('constitution'));
    }

    public function print($invoice){
        $invoice = Invoice::find($invoice);
        return view('pages.invoice.invoice-print', compact('invoice'));
    }

    public function store(Request $request){
        return back();
    }
}
