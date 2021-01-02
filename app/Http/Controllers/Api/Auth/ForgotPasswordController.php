<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    
   public function sendInfo(Request $request){
       $data = $request->validate([
           'phone_number' => 'required|string'
       ]);

       $user = User::wherePhoneNumber($data['phone_number'])->first();
       
    //    return response()->json(compact('user'));
        
       if($user){
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $twilio->verify->v2->services($twilio_verify_sid)
                ->verifications
                ->create((string)'+222'. $data['phone_number'], "sms");
           $token = JWTAuth::fromUser($user);
           return response()->json(compact('user', 'token'));
       }else{
           $user_error = "Aucune Corespondance avec ce numèro de Téléphone";
            return response()->json(compact('user_error'));
       }
   }

   


   protected function verify(Request $request)
    {
        $data = $request->validate([
            'verification_code' => ['required', 'numeric'],
            'phone_number' => ['required', 'string'],
        ]);

        try {
            $token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_sid = getenv("TWILIO_SID");
            $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
            $twilio = new Client($twilio_sid, $token);
            $verification = $twilio->verify->v2->services($twilio_verify_sid)
                ->verificationChecks
                ->create($data['verification_code'], array('to' => '+222'. $data['phone_number']));

            if ($verification->valid) {
                $user = User::where('phone_number', $data['phone_number']);
                $user->update(['isVerified' => true]);
                $token = User::wherePhoneNumber($data['phone_number'])->first();
                /* Authenticate user */
                $token = JWTAuth::fromUser($token);
                $message = "Votre code à bien été verifié, à present veuillez changer votre numéro de passe";
                return response()->json(compact('message', 'token'));
            }
        } catch (TwilioException $e) {
            return response()->json($e->getMessage()); 
        }
        /* Get credentials from .env */
        // $message = "Votre code est invalid";
        // return response()->json(compact('message'));
    }

    public function resetPassword(Request $request)
    {

        $this->validate($request, [
            'newpassword' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();
        $token = JWTAuth::fromUser($user);
        if($user->save()){
            return ['message' => 'Le mot de passe a été changé avec succès.', 'user' => $user, 'token' => $token];
        }else {
            return ['message' => 'Erreur de changement de mot passe, veuillez ressayez.'];
        }
    }

}
