<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        "path",
        "table_name"
    ];

    protected $hidden = [
        "id",
        "row_id",
        "created_at",
        "updated_at"
    ];

    protected function getPathAttribute($value)
    {
        return generateUrl($value);
    }
}
