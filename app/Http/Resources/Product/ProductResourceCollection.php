<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\PaginateResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResourceCollection extends PaginateResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => ProductResource::collection($this->collection['data']),
            'links' => $this->generateLinks()
        ];
    }
}