<?php

namespace App\Http\Controllers;

use App\Services\Tax\ITaxService;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function __construct(protected ITaxService $taxService)
    {
    }

    public function get(Request $request)
    {
        $response = $this->taxService->get($request);
        return $this->responseArray($response);
    }
}
