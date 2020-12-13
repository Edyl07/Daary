<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class MessageController extends Controller
{
    // MESSAGE
    public function message()
    {
        $messages = Message::where('agent_id', 2)->get();

        $auth = Auth::id();
        // dd($auth);
        return ['messages' => $messages];
    }
}
