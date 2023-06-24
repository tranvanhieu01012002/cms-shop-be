<?php

namespace App\Services\Tax;

use App\Repositories\Tax\ITaxRepository;
use App\Services\BaseService;

class TaxService extends BaseService implements ITaxService
{
    public function __construct(ITaxRepository $taxRepo)
    {
        $this->repo = $taxRepo;
    }
}
