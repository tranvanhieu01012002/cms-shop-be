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
        // $url = Storage::temporaryUploadUrl("images/image123.png", now()->addMinutes(15));
        $url = Storage::temporaryUrl("images/image123.png", now()->addMinutes());
        // $status = Storage::setVisibility("images/first3.jpg", "public");
        // $url = Storage::setVisibility("images/first2.png", "public");
        // ->temporaryUploadUrl("images/first1.png", now()->addMinutes(15));
        return $this->response(["url" => $url]);
    }
}
