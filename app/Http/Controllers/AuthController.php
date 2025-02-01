<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Метод для входа
    public function login(Request $request)
    {
        // Логика аутентификации (например, использование email и пароля)
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация прошла успешно
            return response()->json(['message' => 'Login successful']);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
