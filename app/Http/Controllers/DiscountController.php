<?php

namespace App\Http\Controllers;

use App\Constants\RestfulRule;
use App\Services\Discount\IDiscountService;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct(
        protected IDiscountService $discountService
    ) {
    }

    public function index(Request $request)
    {
        if ($request->has(RestfulRule::GET_ALL)) {
            $response = $this->discountService->getAll($request);
        } else {
            $response = $this->discountService->index($request);
        }
        return $this->responseArray($response);
    }
}
