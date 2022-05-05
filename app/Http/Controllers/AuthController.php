<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api')->except('login');
    // }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['status' => 1, 'message' => 'invalid credentials'], 401);
        }

        return response()->json(['status' => 0, 'token' => $token]);
    }

    public function me()
    {
        $payload = \JWTAuth::parseToken()->getPayload();

        // return $payload;
        
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['status' => 0]);
    }
}
