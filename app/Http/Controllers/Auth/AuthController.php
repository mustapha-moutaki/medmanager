<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authService->registerUser($request->validated());
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(LoginRequest $request)
    {
        if ($this->authService->loginUser($request->validated())) {
            return response()->json(['message' => 'Login successful'], 200);
        }
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // public function logout(Request $request)
    // {
    //     auth()->logout();
    //     return response()->json(['message' => 'Logout successful'], 200);
    // }
}
