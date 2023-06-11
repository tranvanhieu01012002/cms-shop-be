<?php

namespace App\Services\Auth;

use App\Repositories\User\IUserRepository;

class SanctumAuthService implements IAuthService
{
    protected IUserRepository $userRepo;

    public function __construct(IUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login(array $request)
    {
    }

    public function register(array $request): array
    {
        $token = $this->userRepo->register($request);
        return [
            "code" => 201,
            "message" => "create user successful",
            "data" => [
                "token" => $token,
                "token_type" => "Bearer",
                "expired" => "forever"
            ]
        ];
    }
}
