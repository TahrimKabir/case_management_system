<?php

namespace App\Http\Controllers;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TransferController extends Controller
{
    public function transfer(Request $req){
        $data = array('case_id'=>$req->caseregid, 'court_id'=>$req->sentto);
        // $update = array('under_investigation'=>'Y');

        // CaseR::where('id',$req->caseregid)->update($update);
        Transfer::create($data);
        return redirect()->back()->with('success','successfully sent for investigation');
    }
}
