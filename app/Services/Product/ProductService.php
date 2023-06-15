<?php

namespace App\Services\Product;

use App\Repositories\Category\ICategoryRepository;
use App\Repositories\Tag\ITagRepository;

class ProductService implements IProductService
{
    protected ICategoryRepository $cateRepo;
    protected ITagRepository $tagRep;
    
    public function getRelativeDataForCreate()
    {
    }
}
