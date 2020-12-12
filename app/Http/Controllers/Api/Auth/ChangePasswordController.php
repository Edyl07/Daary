<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\UpdatePasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use App\User;

class ChangePasswordController extends Controller
{
    public function passwordResetProcess(UpdatePasswordRequest $request)
    {
        return $this->updatePasswordRow($request)->count() > 0 ? $this->resetPassword($request) : $this->tokenNotFoundError();
    }

    // Verify if token is valid
    private function updatePasswordRow($request)
    {
        
        return DB::table('password_resets')->where([
            'phone' => $request->phone,
            'token' => $request->resetToken
        ]);
    }

    // Token not found response  
    private function tokenNotFoundError()
    {
        return response()->json([
            'erreur' => 'Votre numéro de téléphone est incorrect'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    // Reset password
    private function resetPassword($request)
    {
        // find email
        $userData = User::wherePhone($request->phone)->first();
        // update password
        $userData->update([
            'password' => bcrypt($request->password)
        ]);
        // remove verification data from db
        $this->updatePasswordRow($request)->delete();

        // reset password response
        return response()->json([
            'data' => 'Votre mot de passe à été mis à jour.'
        ], Response::HTTP_CREATED);
    }
}
