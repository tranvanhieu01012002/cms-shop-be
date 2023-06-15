<?php

namespace App\Services\Tag;

use App\Constants\RestfulRule;
use App\Repositories\Tag\ITagRepository;
use App\Traits\PrepareDataResponse;
use Illuminate\Http\Request;

class TagService implements ITagService
{
    use PrepareDataResponse;

    protected ITagRepository $tagRepo;

    public function __construct(ITagRepository $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    public function get(Request $request)
    {
        $response = $this->tagRepo
            ->paginate(
                0,
                $request->has(RestfulRule::FIELDS)
                    ? explode(",", $request->get(RestfulRule::FIELDS))
                    : ["*"]
            );
        return $this->prepareData($response);
    }
}
