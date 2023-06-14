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

    public function register(array $fields): mixed
    {
        $fields["role_id"] = 1;
        $fields["balance"] = 0;
        $fields["name"] = " hieu";

        return $this->model->create($fields);
    }

    public function getListUserWithoutAdmin()
    {
        $roleAdmin = 2;
        return $this->model->where("role_id", "<>", $roleAdmin)->paginate();
    }
}
