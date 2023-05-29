<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function sendOTP(Request $request, $otp)
    {
        $user = $this->guard()->user();

        Mail::to($user->email)->send(new OTPMail($otp));
    }

    protected function authenticated(Request $request, $user)
    {
        // Generate OTP and send it via email
        $otp = mt_rand(100000, 999999);
        $this->sendOTP($request, $otp);

        // Store the generated OTP in the session
        $request->session()->put('otp', $otp);

        // return redirect()->intended($this->redirectPath());
        return redirect()->route('otp.verify');
    }

    public function logout(Request $request)
    {
        // Clear the stored OTP from the session
        $request->session()->forget('otp');

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
