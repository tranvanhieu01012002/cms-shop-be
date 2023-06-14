<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\Category\ICategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected ICategoryService $categoryService;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function create(CategoryRequest $request)
    {
        $response = $this->categoryService->create($request->toArray());
        return $this->responseArray($response);
    }

    public function get()
    {
        $response = $this->categoryService->get();
        return $this->responseArray($response);
    }
}
