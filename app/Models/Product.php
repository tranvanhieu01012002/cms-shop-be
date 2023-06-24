<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug', 'sku',
        'barcode', 'stock',
        'price',
        'status',
        'discount',
        'tax_fee'
    ];

    protected $hidden = [
        "updated_at"
    ];

    public function media()
    {
        return $this->hasMany(Media::class, "row_id");
    }

    public function getCreatedAtAttribute($value)
    {
        $time = Carbon::create($value);
        return $time->toDayDateTimeString();
    }
}
