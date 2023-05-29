<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CaseR;
use App\Models\HearingFor;
use App\Models\HearingDate;
use App\Models\Law;
use App\Models\Evidence;
use App\Models\DefendantInfo;
class CaseProfileController extends Controller
{
    public function index($id){
        $law = Law::select('law_name')
        ->distinct()
        ->get();
        $section = Law::all();
        $case = CaseR::where('id',$id)->first();
        $hfor = HearingFor::all();
        return view('case-profile',compact('case','hfor','law','section','id'));
    }

    public function store(Request $req){
     $data = array('hearingFor_id'=>$req->hfor, 'case_id'=>$req->case_id,'next_date'=>$req->hdate);
     HearingDate::create($data);
     return redirect()->back()->with('success','successfully set');
    }

    public function investigation(Request $req){
        $file = $req->file;
        for($i=0;$i<count($file);$i++){
            $fileName = $file[$i]->getClientOriginalName();
            $fileSize = $file[$i]->getSize();
            $fileType = $file[$i]->getClientMimeType();
            $uploadDir = 'evidence/';
            $uploadedFileName = $uploadDir . uniqid() . '_' . $fileName;
            //    dd( $uploadedFileName);
            // Move the uploaded file to the desired directory
            if ($file[$i]->move($uploadDir, $uploadedFileName)) {
                if(Auth::user()->userInfo->court_id!=NULL){
                    $data=array('case_id'=>$req->case_id,'court_id'=>Auth::user()->userInfo->court_id,'file'=>$uploadedFileName,'iarea_id'=>"");
                
                    Evidence::create($data);
                }else{
                    $data=array('case_id'=>$req->case_id,'court_id'=>"",'file'=>$uploadedFileName,'iarea_id'=>Auth::user()->userInfo->iarea_id);
                
                    Evidence::create($data);
                }
                
                
            } else {
                echo 'Failed to move uploaded file.';
            }
            
        }
        if($req->isValid =='Y'){
            $update = array('under_investigation'=>'V');
            CaseR::where('id',$req->case_id)->update($update);
        }
      
        return redirect()->back();
    }

    public function presence(Request $req){
        
        $section = $req->section;
        // for($i=0;$i<count($section);$i++){
        //    
        //     $law = + ',' + "$section [i]";
        // }
        $section = $req->section;
        $law = implode(',', $section);
        date_default_timezone_set('Asia/Dhaka');
         $currentDate = date('Y-m-d');
        //  $case = HearingDate::where('case_id',$req->case_id)->whereDate('next_date', '=',  $currentDate)->first();
        // if($case !=NULL){
        //     dd($case);
        // }else{

        // }
         if(Auth::user()->userInfo->court_id!=NULL){
            $data = array('case_id'=>$req->case_id,'section'=> $law,'defendant_id'=>$req->did,'is_present'=>$req->present,'hearingDate_id'=>$req->hearingDate_id,'orderForstatus'=>'','order'=>$req->shortOrder,'court_id'=>Auth::user()->userInfo->court->id);
            DefendantInfo::create($data);
            return redirect()->back();
        }
        

        // DefendantInfo::create($data);
        // dd($law);
    }
}
