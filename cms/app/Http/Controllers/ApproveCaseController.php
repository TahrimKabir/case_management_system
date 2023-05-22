<?php

namespace App\Http\Controllers;

use App\Models\ApproveCourtCase;
use App\Models\CaseTakenbylaw;
use App\Models\CaseR;
use App\Models\Law;
use Illuminate\Http\Request;

class ApproveCaseController extends Controller
{
    public function index()
    {
        $complaint = CaseR::where('court_id', 1)->where('is_approved', 'N')->get();
        $law = Law::select('law_name')
            ->distinct()
            ->get();
        $section = Law::all();
        return view('case-approve', compact('complaint', 'law', 'section'));
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
