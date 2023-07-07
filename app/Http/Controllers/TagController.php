<?php

namespace App\Http\Controllers;

use App\Constants\RestfulRule;
use App\Services\Tag\ITagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected ITagService $tagService;

    public function __construct(ITagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index(Request $request)
    {
        if ($request->has(RestfulRule::GET_ALL)) {
            $response = $this->tagService->getAll($request);
        } else {
            $response = $this->tagService->index($request);
        }
        return $this->responseArray($response);
    }
}
