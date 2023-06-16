<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxFee extends Model
{
    use HasFactory;

    protected $table = "tax_fee";

    protected $hidden = [
        "created_at",
        "updated_at",
    ];
}
