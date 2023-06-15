<?php

namespace App\Services\Category;

use App\Services\IGetActionService;

interface ICategoryService extends IGetActionService
{
    public function create($attributes = []);
}
