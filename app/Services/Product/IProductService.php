<?php

namespace App\Services\Product;

use App\Services\IGetActionService;

interface IProductService extends IGetActionService
{
    public function getRelativeDataForCreate();
}
