<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseR;
class CaseTypeController extends Controller
{
    public function index($type){
        $from = strtotime(date('Y-m-01'));
        $to = strtotime(date('Y-m-d'));
        $case = CaseR::where('casetype',$type)->where('is_approved','Y')->whereDate('updated_at', '>', date('Y-m-d', $from))->whereDate('created_at', '<', date('Y-m-d', $to))->get();
        return view('TypewiseCase',compact('case','type','from','to'));
    }

    public function search(Request $req){
        $type = $req->type;
        
        $from = strtotime($req->from);
        $to = strtotime($req->to);
        $case = CaseR::where('casetype',$type)->where('is_approved','Y')->whereDate('updated_at', '>', date('Y-m-d', $from))->whereDate('created_at', '<', date('Y-m-d', $to))->get();
        
        return view('TypewiseCase',compact('from','to','type','case'));
   }
}
