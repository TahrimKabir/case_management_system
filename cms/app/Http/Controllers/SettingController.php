<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourtCat;
use App\Models\HearingFor;
use App\Models\Area;
use App\Models\IArea;
use App\Models\Bdcourt;
use App\Models\Court;
use App\Models\Jurisdriction;
class SettingController extends Controller
{
    public function index(){
        
        
        $courtCat = courtCat::all();
        $area = Area::all();
        $bdcourt = Bdcourt::all();
        $court=Court::all();
        $thana = IArea::where('area','thana')->get();
        return view('setting',compact('courtCat','area','bdcourt','court','thana'));
    }

    public function courtCat(Request $req){
        $data = array("courtCat"=>$req->courtCat);
        CourtCat::create($data);
        return redirect()->back()->with('success','succesfully added');
    }

    public function hearingfor(Request $req){
        $data = array("courtCat_id"=> $req->courtCat, "hearing_for"=> $req->hearingfor);
        HearingFor::create($data);
        return redirect()->back()->with('success','succesfully added');
    }

    public function area(Request $req){
     $data = array('area'=>$req->area);
     Area::create($data);
     return redirect()->back()->with('success','succesfully added');
    }
    
    public function i_area(Request $req){
        $data = array('area'=>$req->area,'area_name'=>$req->area_name);
        
        IArea::create($data);
        return redirect()->back()->with('success','succesfully added');
       }

       public function bdcourt(Request $req){
        $data=array('courtname'=>$req->bdcourt);
        Bdcourt::create($data);
        return redirect()->back()->with('success','succesfully added');
       }

       public function addcourt(Request $req){
        $data=array('court_name'=>$req->bdcourt ,'Court_number'=>$req->court_num);
        Court::create($data);
        return redirect()->back()->with('success','succesfully added');
       }

       public function jurisdriction(Request $req){
        $data=array('thana_id'=>$req->court ,'court_id'=>$req->jurisdriction);
        Jurisdriction::create($data);
        
        return redirect()->back()->with('success','succesfully added');
       }
}
