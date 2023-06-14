<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\IArea;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;
class RegistrationController extends Controller
{
    public function index()
    {
        $iarea = IArea::where('area', 'thana')->get();
        $court = Court::all();
        return view('registration', compact('iarea', 'court'));
    }
    public function store(Request $req)
    {
        $data = array('name' => $req->name, 'email' => $req->email, 'password' => Hash::make($req->pass));
        $count = User::where('email', $req->email)->get();
        // if (count($count) == 0) {
        // if ($req->pass == $req->pass1) {
        User::create($data);
        $user = User::where('email', $req->email)->first();
        // if($c){

        // if ($req->court != null) {
        if ($user->id != null) {
            $info = array('user_id' => $user->id, 'court_id' => $req->court, 'iarea_id' => $req->thana);
            // UserInfo::create($info);

        }
        $user_id = $user->id; // Replace with the actual user_id
        $user_email = $user->email;
        $userInfo = new UserInfo;
        $userInfo->user_id = $user_id;
        $userInfo->court_id = $req->court; // Replace with the actual court_id
        $userInfo->iarea_id = $req->thana; // Replace with the actual iarea_id
        $userInfo->save();
        // } else {
        //     $info = array('user_id' => $user->id, 'court_id' => "", 'iarea_id' => $req->thana);
        //     UserInfo::create($info);
        //     return redirect()->back()->with('success', 'successful');
        // }
        // }

        // $otp = $req->pass;

        Mail::to( $user_email)->send(new OTPMail($req->pass));
        // }

        // }
        return redirect()->back()->with('success', 'successful');
    }
}
