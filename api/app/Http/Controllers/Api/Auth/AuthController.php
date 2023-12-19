<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum', ['except' => ['login', 'register']]);
    }

    public function login(LoginAuthRequest $request, AuthService $authService): JsonResponse
    {
        return $authService->login($request);
    }

    public function register(RegisterAuthRequest $request, UserService $userService): JsonResponse
    {
        return $userService->register($request);
    }

    public function logout(AuthService $authService): JsonResponse
    {
        return $authService->logout();
    }

    public function refresh(AuthService $authService): JsonResponse
    {
        return $authService->refresh();
    }
}
