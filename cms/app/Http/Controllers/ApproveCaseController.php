<?php

namespace App\Http\Controllers;

use App\Models\ApproveCourtCase;
use App\Models\CaseTakenbylaw;
use App\Models\CaseR;
use App\Models\IArea;
use App\Models\Law;
use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ApproveCaseController extends Controller
{
    public function index()
    { 
        $law = Law::select('law_name')
            ->distinct()
            ->get();
        $section = Law::all();
        $iareas = IArea::all();
        $court = Court::all();
    //    dd(Auth::user()->userInfo->court_id);
        if(Auth::user()->userInfo->court_id==NULL){
            $court = Court::where('court_name',Auth::user()->Auth::user()->userInfo->court->court_name)->get();
            $complaint = CaseR::where('court_id', NULL)->where('jurisdriction_id', Auth::user()->userInfo->IArea->id)->where('is_approved', 'N')->get();
            return view('case-approve', compact('complaint', 'law', 'section','iareas','court'));
        }else{
            $complaint = CaseR::where('court_id', Auth::user()->userInfo->court->id)->where('is_approved', 'N')->get();
            return view('case-approve', compact('complaint', 'law', 'section','iareas','court'));
        }
       
    }

    public function approveCase(Request $req)
    {
        $section = $req->section;
        for($i=0;$i<count($section);$i++)   {
            $data = array("case_reg_id" => $req->caseregid, "approvedbylaw_id" => $section[$i]);   
            ApproveCourtCase::create($data);
        }
        $approvedData=array("case_reg_id" =>$req->caseregid,"approvedbylaw_id" =>"Not Applicable");
        CaseTakenbylaw::create($approvedData);
        $updateReg = array("is_approved" => "Y");
        CaseR::where("id", $req->caseregid)->update($updateReg);
        return redirect()->back()->with("success", "Case has been approved successfully");

    }
}
