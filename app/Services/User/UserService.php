<?php

namespace App\Services\User;

use App\Constants\Pagination;
use App\Constants\RestfulRule;
use App\Http\Resources\User\UserCollectionResource;
use App\Repositories\User\IUserRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class UserService extends BaseService implements IUserService
{
    protected IUserRepository $userRepo;
    public function __construct(IUserRepository $repo)
    {
        $this->userRepo = $repo;
        $this->resourceCollection = UserCollectionResource::class;
    }

    public function index(Request $request)
    {
        $response = $this->userRepo->getListUserWithoutAdmin();
        return $this->prepareData(new $this->resourceCollection($response));
    }
}
