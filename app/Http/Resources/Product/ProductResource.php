<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Media\MediaResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'cell' => [
                'name' => $this->resource->name,
                'description' => $this->resource->description,
                'image' => $this->resource->media->pluck('path')->first()
            ],
            'sku' => $this->resource->sku,
            'category' => $this->resource->categories->pluck('name')->first(),
            'stock' =>  $this->resource->stock,
            'price' => $this->resource->price,
            'status' => $this->resource->status,
            'added' => Carbon::parse($this->resource->created_at)->toDateString()
        ];
    }
}
