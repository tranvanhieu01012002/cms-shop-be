<?php

namespace App\Services\Category;

interface ICategoryService
{
    public function create($attributes = []);

    public function get();
}
