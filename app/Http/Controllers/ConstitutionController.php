<?php

namespace App\Http\Controllers;

use App\Models\Constitution;
use Illuminate\Http\Request;

class ConstitutionController extends Controller
{
    public function index(){
        $constitution = Constitution::first();
        return view('pages.constitution', compact('constitution'));
    }
    public function store(Request $request){
        return back();
    }
}
