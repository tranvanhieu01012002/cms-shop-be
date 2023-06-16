<?php

namespace App\Http\Controllers;

use App\Services\Discount\IDiscountService;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected IDiscountService $discountService;

    public function __construct(IDiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    public function get(Request $request){
        $response = $this->discountService->get($request);
        return $this->responseArray($response);;
    }
}
