<?php

namespace App\Services\Auth;

use App\Repositories\User\IUserRepository;
use App\Traits\PrepareDataResponse;
use Illuminate\Support\Facades\Auth;

class SanctumAuthService implements IAuthService
{
    use PrepareDataResponse;

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
                return  $this->prepareData([], 401, "username or email were incorrect!");;
            }
        } catch (\Throwable $th) {
            return $this->prepareDataServerError($th->getMessage());
        }
    }

    public function register(array $request): array
    {
        try {
            $user = $this->userRepo->register($request);
            $token = $user->createToken('auth-token')->plainTextToken;
            return $this->createCustomResponse($token, 201, "create user successful");
        } catch (\Throwable $th) {
            return $this->prepareDataServerError($th->getMessage());
        }
    }

    public function createCustomResponse(string $token, int $code = 200, string $message = ""): array
    {
        $data = [
            "token" => $token,
            "token_type" => "Bearer",
            "expired" => "forever"
        ];
        return $this->prepareData($data, $code, $message);
    }
}
