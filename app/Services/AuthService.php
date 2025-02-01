<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $user->createToken('API Token')->plainTextToken;
        }

        return null;
    }

    public function logout(User $user)
    {
        $user->tokens->each(function ($token) {
            $token->delete();
        });
    }
}
