<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\Model_has_roles;
use App\Models\Role_has_permission;
class RoleController extends Controller
{
    public function index(){
       $permission =  Permission::all();
       $role=Role::all();
        return view('permission',compact('permission','role'));
    }

    public function store(Request $req){
        $data = array("name"=> $req->role, "guard_name"=>"web");
        Role::create($data);
       
        
        
        return back();
    }

    public function permission(Request $req){
        $role = Role::where('id',$req->role_id)->first();
        // dd($req->permit);
        $permission = $req->permit;
        for($i=0;$i<count($permission);$i++){
         $pdata = array("permission_id"=>$permission[$i],"role_id"=>$role->id);
         Role_has_permission::create($pdata);
        }
    }

    public function userList(){
        $users=User::all();
        return view('userlist',compact('users'));
    }

    public function editRole($id){
        $users=User::where('id',$id)->first();
        $roles = Role::all();
        $permission=permission::all();
        
        return view('edit-user-role',compact('users','roles','id','permission'));
    }

    public function addRole(Request $req){
     $data = array('role_id'=>$req->role,'model_id'=>$req->id);
     Model_has_roles::create($data);
     return redirect()->back();
    }

}
