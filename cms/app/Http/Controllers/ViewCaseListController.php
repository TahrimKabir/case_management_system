<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ApproveCourtCase;
use App\Models\CaseR;
class ViewCaseListController extends Controller
{
    public function index(){
        if(Auth::user()->userInfo->court_id !=NULL){
            $allCase = CaseR::where("court_id", Auth::user()->userInfo->court->id)->whereMonth("created_at", date('m'))->where('is_approved','Y')->get();
            return view('view-case-list',compact("allCase"));
        }
        
        else{
            $allCase = CaseR::where("court_id", NULL)->where("jurisdriction_id", Auth::user()->userInfo->IArea->id)->get();
        return view('view-case-list',compact("allCase"));
        }

        
    }
    public function searchcaselist(Request $req){
        if(Auth::user()->userInfo->court_id !=NULL){
            $allCase = CaseR::where("court_id", Auth::user()->userInfo->court->id)->whereDate("updated_at",'>', date('Y-m-d',strtotime($req->from)))->whereDate("updated_at",'<', date('Y-m-d',strtotime($req->to)))->where('is_approved','Y')->get();
            // dd($allCase);
            return view('view-case-list',compact("allCase"));
        }
        
        else{
            $allCase = CaseR::where("court_id", NULL)->where("jurisdriction_id", Auth::user()->userInfo->IArea->id)->whereDate("updated_at",'>', date('Y-m-d',strtotime($req->from)))->whereDate("updated_at",'<', date('Y-m-d',strtotime($req->to)))->get();
        return view('view-case-list',compact("allCase"));
        }
    }
    public function transfer(Request $req){
       $data = array('court_id'=>$req->court_id);
       CaseR::where('id',$req->case_id)->update($data);
       return redirect()->back()->with("success","successfully transferred");
    }
}
