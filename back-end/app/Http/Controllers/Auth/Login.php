<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request): JsonResponse
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();
            $user = Auth::user();
            return response()->json(['data' => compact('user')], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}
