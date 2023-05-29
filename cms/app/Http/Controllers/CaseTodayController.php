<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\HearingFor;
use App\Models\HearingDate;
class CaseTodayController extends Controller
{
    public function index(){
        date_default_timezone_set('Asia/Dhaka');
        $currentDate = date('Y-m-d');
      
        $hfor = HearingFor::all();
        $hdate = HearingDate::whereDate('next_date',date('Y-m-d'))->get();
        return view('case-today',compact('hfor','hdate'));
    }
}
