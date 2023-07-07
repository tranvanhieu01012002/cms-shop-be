<?php

namespace App\Services;

use Illuminate\Http\Request;

interface IGetActionService
{
    public function index(Request $request);

    public function getAll(Request $request);
}
