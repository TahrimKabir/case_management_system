<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseR;

class ApproveCaseController extends Controller
{
    public function index(){
        $complaint =CaseR::where('court_id',1)->get();
        return view('case-approve',compact('complaint'));
    }
}
