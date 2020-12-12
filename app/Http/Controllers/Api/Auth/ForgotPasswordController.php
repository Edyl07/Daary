<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class ForgotPasswordController extends Controller
{
    
   public function sendInfo(Request $request){
       $data = $request->validate([
           'phone' => 'required|string'
       ]);

       $user = User::wherePhone($data['phone'])->first();
       
    //    return response()->json(compact('user'));
        
       if($user){
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create($data['phone'], "sms");
           $user_token = JWTAuth::fromUser($user);
           return response()->json(compact('user', 'user_token'));
       }else{
           $user_error = "Aucune Corespondance avec ce numèro de Téléphone";
            return response()->json(compact('user_error'));
       }
   }

   


   protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone' => ['required', 'string'],
        ]);

        try {
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($data['verification_code'], array('to' => $data['phone']));

            if ($verification->valid) {
                $user = User::where('phone', $data['phone']);
                $user->update(['isVerified' => true]);
                $user_token = User::wherePhone($data['phone'])->first();
                /* Authenticate user */
                $user_token = JWTAuth::fromUser($user_token);
                $message = "Votre à bien été verifié";
                return response()->json(compact('message', 'user_token'));
            }
        } catch (TwilioException $e) {
            return response()->json($e->getMessage()); 
        }
        /* Get credentials from .env */
        // $message = "Votre code est invalid";
        // return response()->json(compact('message'));
    }

    public function changePassword(){
        $user = auth()->user();

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'));
    }
}