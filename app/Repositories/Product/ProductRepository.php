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

    public function paginate(int $limit = Pagination::LIMIT, $column = ['*'])
    {
        $page =  request()->query("page") ?? 1;
        $limit = $limit > 1 ? $limit : Pagination::LIMIT;
        $offset = $page == 1 ? 0 : ($page - 1) * $limit;
        $count = $this->model->count();
        return [
            'masterData' => [
                'count' => $count
            ],
            'data' => $this->model
                ->with(['media', 'categories'])
                ->offset($offset)
                ->limit($limit)
                ->latest()
                ->get($column)
        ];
    }
}
