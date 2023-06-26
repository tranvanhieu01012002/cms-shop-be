<?php

namespace App\Http\Controllers;

use App\Services\Variation\IVariationService;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function __construct(protected IVariationService $variationService)
    {
    }

    public function get(Request $request)
    {
        $response = $this->variationService->get($request);
        return $this->responseArray($response);
    }
}
