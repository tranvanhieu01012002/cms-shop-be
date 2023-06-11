<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\IAuthService;

class AuthController extends Controller
{
    protected IAuthService $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->authService->register($request->toArray());
        return $this->responseArray($response);
    }

    public function login(LoginRequest $request)
    {
        $response = $this->authService->login($request->only(["email", "password"]));
        return $this->responseArray($response);
    }
}
