<?php

namespace App\Http\Controllers;

use App\Services\Product\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected IProductService $productSer)
    {
    }

    public function get(Request $request)
    {
        $response = $this->productSer->get($request);
        return $this->responseArray($response);
    }
}
