<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Model_has_roles;
class RoleController extends Controller
{
    public function index(){
        return view('permission');
    }

    public function store(Request $req){
        $data = array("name"=> $req->role, "guard_name"=>"web");

        Role::create($data);
        
        return back();
    }

    public function userList(){
        $users=User::all();
        return view('userlist',compact('users'));
    }

    public function editRole($id){
        $users=User::where('id',$id)->first();
        $roles = Role::all();
        return view('edit-user-role',compact('users','roles','id'));
    }

    public function addRole(Request $req){
     $data = array('role_id'=>$req->role,'model_id'=>$req->id);
     Model_has_roles::create($data);
     return redirect()->back();
    }
}
