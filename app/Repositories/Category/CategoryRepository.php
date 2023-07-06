<?php

namespace App\Repositories\Category;

use App\Constants\Pagination;
use App\Models\Category;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function getModel()
    {
        return Category::class;
    }

    public function paginationWithMedia(int $limit = Pagination::LIMIT, $column = ['*'])
    {
        $this->setWith(['media']);
        return parent::paginate($limit, $column);
    }
}
