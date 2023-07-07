<?php

namespace App\Http\Controllers;

use App\Constants\RestfulRule;
use App\Services\Variation\IVariationService;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function __construct(protected IVariationService $variationService)
    {
    }

    public function index(Request $request)
    {
        if ($request->has(RestfulRule::GET_ALL)) {
            $response = $this->variationService->getAll($request);
        } else {
            $response = $this->variationService->index($request);
        }
        return $this->responseArray($response);
    }
}
