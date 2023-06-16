<?php

namespace App\Services\Discount;

use App\Repositories\Discount\IDiscountRepository;
use App\Services\BaseService;

class DiscountService extends BaseService implements IDiscountService
{   
    public function __construct(IDiscountRepository $discountRepo)
    {
        $this->repo = $discountRepo;
    }
}
