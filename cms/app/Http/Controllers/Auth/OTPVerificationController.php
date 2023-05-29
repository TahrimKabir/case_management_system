<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OTPVerificationController extends Controller
{
    public function showVerifyForm()
    {
        return view('auth.verify_otp');
    }

    public function verify(Request $request)
    {
        $enteredOTP = $request->input('otp');
        $storedOTP = $request->session()->get('otp');

        if ($enteredOTP == $storedOTP) {
            // Correct OTP, log in the user
            auth()->login($request->user());
            $request->session()->forget('otp');
            // return redirect()->intended($this->redirectPath());
            return redirect('/dashboard');
            
        } else {
            // Incorrect OTP, redirect back with error message
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP']);
        }
    }
}
