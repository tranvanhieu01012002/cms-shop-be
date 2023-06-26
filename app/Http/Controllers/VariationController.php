<?php

namespace App\Http\Controllers;

use App\Services\Variation\IVariationService;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    protected IVariationService $variationService;

    public function __construct(IVariationService $variationService)
    {
        $this->variationService = $variationService;
    }

    public function get(Request $request)
    {
        $response = $this->variationService->get($request);
        return $this->responseArray($response);
    }
}
