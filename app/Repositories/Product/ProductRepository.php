<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function getModel()
    {
        return Product::class;
    }

    public function getRelativeDataForCreate()
    {
    }

    public function paginate(int $limit = 20, $column = ['*'])
    {
        return $this->model->with(['media' => function ($query) {
            $query->where("table_name", "products");
        }])->paginate($limit, $column);
    }
}
