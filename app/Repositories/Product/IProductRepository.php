<?php

namespace App\Repositories\Product;

use App\Constants\Pagination;
use App\Repositories\IRepository;

interface IProductRepository extends IRepository
{
    public function paginateWithMediaAndCategories(int $limit, $column = ['*']);
}
