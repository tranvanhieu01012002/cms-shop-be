<?php

namespace App\Repositories\Category;

use App\Repositories\IRepository;

interface ICategoryRepository extends IRepository 
{
    public function paginationWithMedia(int $limit, $column);
}