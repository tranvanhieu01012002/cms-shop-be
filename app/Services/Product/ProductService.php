<?php

namespace App\Services\Product;

use App\Repositories\Category\ICategoryRepository;
use App\Repositories\Product\IProductRepository;
use App\Repositories\Tag\ITagRepository;
use App\Traits\PrepareDataResponse;
use Illuminate\Http\Request;

class ProductService implements IProductService
{

    use PrepareDataResponse;

    public function __construct(
        protected ICategoryRepository $cateRepo,
        protected ITagRepository $tagRep,
        protected IProductRepository $productRepo)
    {
    }

    public function getRelativeDataForCreate()
    {
    }

    public function get(Request $request)
    {
        $response = $this->productRepo->paginate();
        return $this->prepareData($response, 200, "get successful");
    }
}
