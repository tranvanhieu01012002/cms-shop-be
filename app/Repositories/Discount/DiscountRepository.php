<?php

namespace App\Repositories\Discount;

use App\Models\Discount;
use App\Repositories\BaseRepository;

class DiscountRepository extends BaseRepository implements IDiscountRepository
{
    public function getModel()
    {
        return Discount::class;
    }
}
