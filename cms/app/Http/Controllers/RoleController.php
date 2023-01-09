<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
    public function index(){
        return view('role');
    }

    public function store(Request $req){
        $data = array("name"=> $req->role, "guard_name"=>"web");

        Role::create($data);
        
        return back();
    }

    // public function (Request $req ) {
    //     $data = array("name"=> $req->role, "guard_name"=>"web");

    //     Role::create($data);
        
    //     return back();
    // }
}
