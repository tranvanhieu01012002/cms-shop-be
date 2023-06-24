<?php

namespace App\Http\Controllers;

use App\Services\Discount\IDiscountService;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct(
        protected IDiscountService $discountSer
    ) {
    }

    public function get(Request $request){
        $response = $this->discountSer->get($request);
        return $this->responseArray($response);
    }
}
