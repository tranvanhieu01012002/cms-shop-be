<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Services\Tag\ITagService;
>>>>>>> master
use App\Services\Tax\ITaxService;
use Illuminate\Http\Request;

class TaxController extends Controller
{
<<<<<<< HEAD
    public function __construct(protected ITaxService $taxService)
    {
=======
    protected ITaxService $taxService;

    public function __construct(ITaxService $taxService)
    {
        $this->taxService = $taxService;
>>>>>>> master
    }

    public function get(Request $request)
    {
        $response = $this->taxService->get($request);
        return $this->responseArray($response);
    }
}
