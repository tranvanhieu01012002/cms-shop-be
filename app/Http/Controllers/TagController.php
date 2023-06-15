<?php

namespace App\Http\Controllers;

use App\Services\Tag\ITagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected ITagService $tagService;

    public function __construct(ITagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function get(Request $request)
    {
        $response = $this->tagService->get($request);
        return $this->responseArray($response);
    }
}
