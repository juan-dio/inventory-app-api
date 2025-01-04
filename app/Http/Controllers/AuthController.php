<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Login function
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'data' => ['token' => $token],
                'message' => 'Login berhasil',
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null,
            'message' => 'Login gagal',
        ]);
    }

    // Logout function
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'data' => null,
            'message' => 'Logout berhasil',
        ]);
    }
}
