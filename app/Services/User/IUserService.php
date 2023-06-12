<?php

namespace App\Services\User;

use Illuminate\Http\Request;

interface IUserService
{
  public function getListUsers(Request $request);
}
