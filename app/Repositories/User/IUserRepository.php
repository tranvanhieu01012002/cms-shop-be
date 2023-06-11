<?php

namespace App\Repositories\User;

use App\Repositories\IRepository;

interface IUserRepository extends IRepository
{
    public function register(array $fields): string;
}
