<?php

namespace App\Repositories\Variation;

use App\Models\Variation;
use App\Repositories\BaseRepository;

class VariationRepository extends BaseRepository implements IVariationRepository
{
    public function getModel()
    {
        return Variation::class;
    }
}
