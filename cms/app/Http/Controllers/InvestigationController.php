<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseR;
use App\Models\Investigation;
use Illuminate\Support\Facades\Auth;
class InvestigationController extends Controller
{
    public function index(){
        if(Auth::user()->userInfo->court_id != NULL){
            $case = CaseR::where('court_id',1)->where('under_investigation','Y')->get();
            return view('caseForInvestigation',compact('case'));
        }
   
    // $case = Investigation::all();
        
    }

    public function store(Request $req){

        $data = array('case_id'=>$req->caseregid, 'thana_id'=>$req->sentto,'enddate'=>$req->enddate);
        $update = array('under_investigation'=>'Y');

        CaseR::where('id',$req->caseregid)->update($update);
        Investigation::create($data);
        return redirect()->back()->with('success','successfully sent for investigation');
    }

    
}
