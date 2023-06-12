<?php

namespace App\Http\Controllers;

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

    public function getListUsers(Request $request)
    {
        $response = $this->userService->getListUsers($request);
        return $this->response($response);
    }

    public function generateUrl()
    {
        $url = Storage::temporaryUploadUrl("images/first.png", now()->addMinutes(15));
        return $this->response(["url" => $url]);
    }
}
