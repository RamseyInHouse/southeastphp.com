<?php

namespace SoutheastPhp\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use SoutheastPhp\Http\Controllers\Controller;
use SoutheastPhp\Http\Requests\Api\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function create(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $token = JWTAuth::attempt($credentials);

        return response()->json(($token));
    }
}
