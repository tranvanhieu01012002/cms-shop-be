<?php

namespace App\Repositories\Tax;

use App\Models\TaxFee;
use App\Repositories\BaseRepository;

class TaxRepository extends BaseRepository implements ITaxRepository
{
    public function getModel()
    {
        return TaxFee::class;
    }
}
