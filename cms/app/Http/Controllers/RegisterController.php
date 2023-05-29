<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\HearingFor;
use App\Models\HearingDate;
class RegisterController extends Controller
{
    public function index($id){
        date_default_timezone_set('Asia/Dhaka');
        $hfor = HearingFor::where('courtCat_id',$id)->get();
       $from = strtotime(date('Y-m-01'));
       $to = strtotime(date('Y-m-d'));
        
        return view('register',compact('hfor','id','from','to'));
    } 

    public function search(Request $req){
         $id = $req->id;
         
         $from = strtotime($req->from);
         $to = strtotime($req->to);
         $hfor = HearingFor::where('courtCat_id',$req->id)->get();
         
         return view('register',compact('from','to','id','hfor'));
    }
}
