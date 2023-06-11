<?php

namespace App\Services\Auth;

interface IAuthService
{
    public function login(array $request): array;

    public function register(array $request): array;
}
