<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Law;

class LawController extends Controller
{
    public function index(){
        $law = Law::orderBy('law_name', 'asc')->get();
        return view('add-law',compact('law'));
    }

    public function store(Request $req){
        $data = array("law_name"=> $req->law, "p_code"=>$req->pcode, "desc"=>$req->desc,"section"=>$req->section);
        
         Law::create($data);
        return redirect()->back()->with('success','successfully added');
    }
    
}
