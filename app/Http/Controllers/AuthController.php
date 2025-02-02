<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        $token = $this->authService->login($credentials);

        if ($token) {
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
            ]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request->user());

        return response()->json(['message' => 'Logout successful']);
    }
}
