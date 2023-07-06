<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "slug",
        "category_id",
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class, "row_id");
    }
}
