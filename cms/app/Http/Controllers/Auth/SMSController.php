<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    use Illuminate\Support\Facades\Http;


    public function sendSMS()
    {
        $twilioSID = 'ACfc379240107a5b871ffebae515e628a4';
        $twilioToken = '30e1ca29e872146a5818313bf07628a7';
        $twilioNumber = '01861691283';
        $recipientNumber = '01861691283';
        $message = 'This is a test SMS message.';
        
        $response = Http::post("https://api.twilio.com/2010-04-01/Accounts/{$twilioSID}/Messages.json", [
            'From' => $twilioNumber,
            'To' => $recipientNumber,
            'Body' => $message,
        ])->withBasicAuth($twilioSID, $twilioToken);
        
        if ($response->successful()) {
            // SMS sent successfully
            return 'SMS sent successfully';
        } else {
            // SMS sending failed
            return 'Failed to send SMS';
        }
    }
}


