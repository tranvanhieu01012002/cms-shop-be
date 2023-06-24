<?php

namespace App\Services\Variation;

use App\Repositories\Variation\IVariationRepository;
use App\Services\BaseService;

class VariationService extends BaseService implements IVariationService
{
    public function __construct(IVariationRepository $variationRepo)
    {
        $this->repo = $variationRepo;
    }
}
