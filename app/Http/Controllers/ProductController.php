<?php

namespace App\Http\Controllers;

use App\Services\Product\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected IProductService $productSer)
    {
    }

    public function index(Request $request)
    {
        $response = $this->productSer->index($request);
        return $this->responseArray($response);
    }

    public function create(Request $request)
    {
        $attribute = $request->only(['name', 'description', 'sku', 'categories', 'barcode', 'stock', 'price', 'status', 'discount', 'tax_fee', 'file']);
        $response = $this->productSer->create($attribute);
        return $this->responseArray($response);
    }
}
