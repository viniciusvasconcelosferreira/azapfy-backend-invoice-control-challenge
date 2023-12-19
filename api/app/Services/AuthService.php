<?php

namespace App\Services;

use App\Http\Requests\LoginAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(LoginAuthRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'user' => $user,
                'authorization' => [
                    'token' => $user->createToken('ApiToken')->plainTextToken,
                    'type' => 'bearer',
                ]
            ]);
        }

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        return response()->json([
            'message' => 'User not found',
        ], 404);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }
}
