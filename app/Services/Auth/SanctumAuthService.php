<?php

namespace App\Services\Auth;

use App\Repositories\User\IUserRepository;
use Illuminate\Support\Facades\Auth;

class SanctumAuthService implements IAuthService
{
    protected IUserRepository $userRepo;

    public function __construct(IUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login(array $request): array
    {
        try {
            if (Auth::attempt($request)) {
                $user = Auth::user();
                $token = $user->createToken('auth-token')->plainTextToken;
                return $this->createCustomResponse($token, 200, "login successful");
            } else {
                return [
                    "code" => 401,
                    "message" => "username or email were incorrect!",
                    "data" => []
                ];
            }
        } catch (\Throwable $th) {
            return $this->responseErrorCode($th->getMessage());
        }
    }

    public function register(array $request): array
    {
        try {
            $user = $this->userRepo->register($request);
            $token = $user->createToken('auth-token')->plainTextToken;
            return $this->createCustomResponse($token, 201, "create user successful");
        } catch (\Throwable $th) {
            return $this->responseErrorCode($th->getMessage());
        }
    }

    public function createCustomResponse(string $token, int $code = 200, string $message = ""): array
    {
        return [
            "code" => $code,
            "message" => $message,
            "data" => [
                "token" => $token,
                "token_type" => "Bearer",
                "expired" => "forever"
            ]
        ];
    }

    public function responseErrorCode(string $message = "")
    {
        return [
            "code" => 500,
            "message" => $message,
            "data" => []
        ];
    }
}
