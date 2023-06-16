<?php

namespace App\Http\Controllers;

use App\Services\Tag\ITagService;
use App\Services\Tax\ITaxService;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    protected ITaxService $taxService;

    public function __construct(ITaxService $taxService)
    {
        $this->taxService = $taxService;
    }

    public function get(Request $request)
    {
        $response = $this->taxService->get($request);
        return $this->responseArray($response);
    }
}
