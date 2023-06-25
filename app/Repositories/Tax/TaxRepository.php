<?php

namespace App\Repositories\Tax;

use App\Models\Tax;
use App\Repositories\BaseRepository;

class TaxRepository extends BaseRepository implements ITaxRepository
{
    public function getModel()
    {
        return Tax::class;
    }
}
