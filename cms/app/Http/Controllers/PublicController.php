<?php

namespace App\Http\Controllers;

use App\Models\CaseR;
use App\Models\Criminal;
use App\Models\Jurisdriction;
use App\Models\Law;
use App\Models\Petitioner;
use App\Models\PetitionerFilledLaw;
use App\Models\Witness;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        return view('user-add-case');
    }
    public function storeCase(Request $req){
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
        $amname = $req->amname;
        $a_address = $req->a_address;
        $incident = $req->incidentDesc;
        $ctype = "cr";
        $jr_id = $req->jurisdriction;
        $cid ="";
        if( $req->ctype == 'cr'){
            $ctype = "cr";
            $f = Jurisdriction::where('id',$req->jurisdriction)->first();
            $cid = $f->court_id;
        }elseif($req->ctype == 'gr'){
            $ctype = "gr";
            $f = Jurisdriction::where('id',$req->jurisdriction)->first();
            $cid = $f->court_id;
        }
        $rule = $req->section;
        $caseCat = $req->caseCat;
        $caseCat = "criminal";
        // $cid = $req->court_id;
        //  $jid = Auth::user()->userInfo->IArea->id;
        $lawid = $req->section;
        
        $data = array('casetype' => $ctype, 'court_id' => $cid, 'case_cat' => $caseCat, 'law_id' => "", "jurisdriction_id" => $jr_id);
        CaseR::create($data);
        $casn = CaseR::where('court_id', $cid)->orderBy('created_at', 'desc')->first();

        $pData = array('case_id' => $casn->id, 'petitioner' => $req->petitioner, 'fname' => $vfname, 'mname' => $req->vmname, 'petitionType' => $req->pType, 'address' => $vaddress);
        Petitioner::create($pData);
        for ($n = 0; $n < count($lawid); $n++) {
            $ldata = array('case_id' => $casn->id, 'law_id' => $lawid[$n]);
            PetitionerFilledLaw::create($ldata);

        }
        for ($i = 0; $i < count($accused); $i++) {
            for ($j = 0; $j < count($afname); $j++) {
                for ($k = 0; $k < count($amname); $k++) {
                    for ($l = 0; $l < count($a_address); $l++) {

                        if ($i == $j && $j == $k && $k == $l && $l == $i) {
                            $cdata = array('case_id' => $casn->id, 'criminal' => $accused[$i], 'fname' => $afname[$j], 'mname' => $amname[$k], 'address' => $a_address[$l]);
                            Criminal::create($cdata);
                        }

                    }
                }
            }
        }
        for ($i = 0; $i < count($wname); $i++) {
            for ($j = 0; $j < count($wfname); $j++) {
                for ($k = 0; $k < count($wmname); $k++) {
                    for ($l = 0; $l < count($waddress); $l++) {

                        if ($i == $j && $j == $k && $k == $l && $l == $i) {
                            $wdata = array('case_id' => $casn->id, 'criminal' => $wname[$i], 'fname' => $wfname[$j], 'mname' => $wmname[$k], 'address' => $waddress[$l]);
                            Witness::create($wdata);
                            // dd($waddress[l]);
                        }

                    }
                }
            }
        }
        return redirect()->back()->with('success', 'Complaint has been filed successfully!');
        
    }

    public function caseList(){
        return view('case-list');
    }

    public function searchList(Request $req){
        $pcase = CaseR::where('casetype',$req->type)->whereDate('updated_at','>',date('Y-m-d',strtotime($req->from)))->whereDate('updated_at','<',date('Y-m-d',strtotime($req->searchListto)))->get();
        if($req->id!=NULL){
            $pcase = CaseR::where('id',$req->id)->get();
        }
        if($req->from!=NULL && $req->from!=NULL ){
        $pcase = CaseR::whereDate('updated_at','>',date('Y-m-d',strtotime($req->from)))->whereDate('updated_at','<',date('Y-m-d',strtotime($req->searchListto)))->get();

        }
       
        return view('case-list',compact('pcase'));
    }
}
