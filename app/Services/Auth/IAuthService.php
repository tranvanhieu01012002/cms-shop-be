<?php

namespace App\Services\Auth;

interface IAuthService
{
    public function login(array $request);

    public function register(array $request): array;
}
