<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use App\User;
use Twilio\Rest\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    public function sendPhone(Request $request)  // this is most important function to send mail and inside of that there are another function
    {
        if (!$this->validatePhone($request->phone)) {  // this is validate to fail send mail or true
            return $this->failedResponse();
        }
        $this->send($request->phone);  //this is a function to send mail 
        return $this->successResponse();
    }

    public function send($phone)  //this is a function to send mail 
    {
        $token = $this->createToken($phone);
        $client = new Client(getenv('TWILIO_SID'), getenv('TWILIO_AUTH_TOKEN')); // token is important in send mail 
        $client->messages->create(
            $phone,
            [
                'from' => '+16317069854',
                'body' => 'Cece est votre code d activation'
            ]
            );
    }

    public function createToken($phone)  // this is a function to get your request email that there are or not to send mail
    {
        $oldToken = DB::table('password_resets')->where('phone', $phone)->first();

        if ($oldToken) {
            return $oldToken->token;
        }

        $token = Str::random(40);
        $this->saveToken($token, $phone);
        return $token;
    }


    public function saveToken($token, $phone)  // this function save new password
    {
        DB::table('password_resets')->insert([
            'phone' => $phone,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }



    public function validatePhone($phone)  //this is a function to get your email from database
    {
        return !!User::where('phone', $phone)->first();
    }

    public function failedResponse()
    {
        return response()->json([
            'error' => 'Ce numéro de téléphone est incorrect'
        ], Response::HTTP_NOT_FOUND);
    }

    public function successResponse()
    {
        return response()->json([
            'data' => 'Reset Email is send successfully, please check your inbox.'
        ], Response::HTTP_OK);
    }
}
