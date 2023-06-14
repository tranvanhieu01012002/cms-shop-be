<?php

namespace App\Services\User;

use App\Repositories\User\IUserRepository;
use Illuminate\Http\Request;

class UserService implements IUserService
{
    protected IUserRepository $userRepo;

    public function __construct(IUserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getListUsers(Request $request)
    {
        return $this->userRepo->getListUserWithoutAdmin();
    }
}
