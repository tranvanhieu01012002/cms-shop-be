<?php

namespace App\Http\Controllers;

use App\Constants\RestfulRule;
use App\Services\Tax\ITaxService;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function __construct(protected ITaxService $taxService)
    {
    }

    public function index(Request $request)
    {
        if ($request->has(RestfulRule::GET_ALL)) {
            $response = $this->taxService->getAll($request);
        } else {
            $response = $this->taxService->index($request);
        }
        return $this->responseArray($response);
    }
}
