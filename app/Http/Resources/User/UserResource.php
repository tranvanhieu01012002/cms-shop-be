<?php

namespace App\Http\Resources\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
                'description' => $this->resource->email,
                'image' => 'https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80'
            ],
            'phone' => $this->resource->phone,
            'order' => 20,
            'balance' => 300,
            'status' => $this->resource->status ?? 'active',
            'created_at' => Carbon::parse($this->resource->created_at)->toDateString()
        ];
    }
}
