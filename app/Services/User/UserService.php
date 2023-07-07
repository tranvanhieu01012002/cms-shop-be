<?php

namespace App\Services\User;

use App\Constants\RestfulRule;
use App\Http\Resources\User\UserCollectionResource;
use App\Repositories\User\IUserRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class UserService extends BaseService implements IUserService
{
    public function __construct(IUserRepository $userRepo)
    {
        $this->repo = $userRepo;
        $this->resourceCollection = UserCollectionResource::class;
    }
}
