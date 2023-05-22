<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApproveCourtCase;
use App\Models\CaseR;
class ViewCaseListController extends Controller
{
    public function index(){
        $allCase = CaseR::where("court_id", 1)->whereMonth("created_at", date('m'))->where('is_approved','Y')->get();
        return view('view-case-list',compact("allCase"));
    }

    // public function app(){
    //     return view('case-approve');
    // }
}
