<?php

namespace App\Repositories\Product;

use App\Constants\Pagination;
use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function getModel()
    {
        return Product::class;
    }

    public function paginateWithMediaAndCategories(int $limit = Pagination::LIMIT, $column = ['*'])
    {
        $this->setWith(['media', 'categories']);
        return parent::paginate(limit: $limit, column: $column);
    }
}
