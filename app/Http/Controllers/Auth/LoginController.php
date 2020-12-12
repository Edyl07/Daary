<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * check is an email address or not
     */

    function checkEmail($email) {
        $find1 = strpos($email, '@');
        $find2 = strpos($email, '.');
        return ($find1 !== false && $find2 !== false && $find2 > $find1);
     }

    protected function credentials(Request $request)
    {
        // is_numeric($request->get('email'))
        if ($this->checkEmail($request->get('phone_number'))) {
            return ['email' => $request->get('phone_number'), 'password' => $request->get('password')];
        }
        return $request->only($this->username(), 'password');
    }

    protected function authenticated($request, $user)
    {
        if ($user->hasRole('Admin')) {

            $this->redirectTo = route('admin.dashboard');
        } elseif ($user->hasRole('Agent')) {

            $this->redirectTo = route('agent.dashboard');
        } elseif ($user->hasRole('User')) {

            $this->redirectTo = route('user.dashboard');
        }
    }
}
