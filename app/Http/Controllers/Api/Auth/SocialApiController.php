<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialApiController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $roleid     = isset($data['agent']) ? 2 : 3;
        $users       =   User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            $token = JWTAuth::fromUser($users);
            return response()->json(compact('user', 'token'), 201);
        } else {
            $user = User::create([
                'name'          => $userSocial->getName(),
                'username'      => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'phone'         => rand(100, 99999999),
                'image'         => $userSocial->getAvatar(),
                'role_id'       => $roleid,
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
                'password' =>   ''
            ]);
            $token = JWTAuth::fromUser($user);
            return response()->json(compact('user', 'token'), 201);
        }
    }
}
