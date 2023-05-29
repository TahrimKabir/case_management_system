<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CaseR;
use App\Models\Criminal;
use App\Models\Petitioner;
use App\Models\Witness;
use App\Models\Law;
use App\Models\PetitionerFilledLaw;
use App\Models\Jurisdriction;

class AddCaseController extends Controller
{
    public function index(){
        $law = Law::select('law_name')
        ->distinct()
        ->get();
        $section = Law::all();
        if(Auth::user()->userInfo->court_id !=NULL){
            $jurisdriction = Jurisdriction::where('court_id',Auth::user()->userInfo->court->id)->get();
            return view('add-case',compact('law','section','jurisdriction'));
        }else{
            $jurisdriction = Jurisdriction::where('thana_id',Auth::user()->userInfo->IArea->id)->get();
        return view('add-case',compact('law','section','jurisdriction'));
        }
        
    }

    public function getValue(Request $req){
        $selectedValue = $req->input('selectedValue');
        dd($selectedValue);
    }
    
    public function store(Request $req){
     $vname = $req->petitioner;
     $accused = $req->aname;
     $vfname = $req->vfname;
     $vmname = $req->vmname;
     $vaddress = $req->vaddress;
     $wname = $req->wname;
     
     $wfname = $req->wfname;
     $wmname = $req->wmname;
     $waddress = $req->w_address;
     $afname = $req->afname;
     $amname=$req->amname;
     $a_address = $req->a_address;
     $incident = $req->incidentDesc;
     $ctype = $req->ctype;
     $rule = $req->section;
     $caseCat = $req->caseCat;
     $caseCat="criminal";
     $cid = Auth::user()->userInfo->court->id;
    //  $jid = Auth::user()->userInfo->IArea->id;
     $lawid=$req->section;
     $jr_id = $req->jurisdriction;
     $data = array('casetype'=>$ctype,'court_id'=>$cid,'case_cat'=>$caseCat,'law_id'=>"","jurisdriction_id"=>$jr_id);
     CaseR::create($data);
     $casn = CaseR::where('court_id',$cid)->orderBy('created_at', 'desc')->first();
     
    $pData = array('case_id'=>$casn->id,'petitioner'=>$req->petitioner,'fname'=>$vfname,'mname'=>$req->vmname,'petitionType'=>$req->pType,'address'=>$vaddress);
    Petitioner::create($pData);
    for($n=0;$n<count($lawid);$n++){
        $ldata = array('case_id'=>$casn->id,'law_id'=>$lawid[$n]);
        PetitionerFilledLaw::create($ldata);

    }
    for($i=0;$i<count($accused);$i++){
        for($j=0;$j<count($afname);$j++){
            for($k=0;$k<count($amname);$k++){
                for($l=0;$l<count($a_address);$l++){
                 
                    if($i==$j && $j==$k && $k==$l && $l==$i){
                        $cdata = array('case_id'=>$casn->id,'criminal'=>$accused[$i], 'fname'=>$afname[$j],'mname'=>$amname[$k] ,'address'=>$a_address[$l]);
                        Criminal::create($cdata);
                    }
            
                }
            }
        }
    }
    for($i=0;$i<count($wname);$i++){
        for($j=0;$j<count($wfname);$j++){
            for($k=0;$k<count($wmname);$k++){
                for($l=0;$l<count($waddress);$l++){
                 
                    if($i==$j && $j==$k && $k==$l && $l==$i){
                        $wdata = array('case_id'=>$casn->id,'criminal'=>$wname[$i], 'fname'=>$wfname[$j],'mname'=>$wmname[$k] ,'address'=>$waddress[$l]);
                        Witness::create($wdata);
                        // dd($waddress[l]);
                    }
            
                }
            }
        }
    }
    return redirect()->back()->with('success','Complaint has been filed successfully!');
    }
}
