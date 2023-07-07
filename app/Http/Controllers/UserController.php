<?php

namespace App\Http\Controllers;

use App\Constants\RestfulRule;
use App\Http\Resources\User\UserCollectionResource;
use App\Http\Resources\User\UserResource;
use App\Services\User\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        if ($request->has(RestfulRule::GET_ALL)) {
            $response = $this->userService->getAll($request);
        } else {
            $response = $this->userService->index($request);
        }
        return $this->responseArray($response);
    }
}
