<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function __invoke(): JsonResponse
    {
        Auth::logout();

        return response()->json();
    }
}
