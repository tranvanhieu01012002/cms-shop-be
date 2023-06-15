<?php

namespace App\Services;

use Illuminate\Http\Request;

interface IGetActionService
{
    public function get(Request $request);
}
