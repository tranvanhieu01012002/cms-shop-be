<?php

namespace App\Http\Controllers;

use App\Services\User\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function getListUsers(Request $request){
        $response = $this->userService->getListUsers($request);
        return $this->response($response);
    }
}
