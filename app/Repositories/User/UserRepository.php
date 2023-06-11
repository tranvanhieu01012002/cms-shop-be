<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements IUserRepository
{
    public function getModel()
    {
        return User::class;
    }

    public function register(array $fields): string
    {
        $fields["role_id"] = 1;
        $fields["balance"] = 0;
        $fields["name"] = " hieu";
        
        $user = $this->model->create($fields);
        return $user->createToken('auth-token')->plainTextToken;
    }
}
