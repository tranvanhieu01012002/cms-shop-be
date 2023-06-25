<?php

namespace App\Services\Tag;

use App\Repositories\Tag\ITagRepository;
use App\Services\BaseService;
use App\Traits\PrepareDataResponse;
use Illuminate\Http\Request;

class TagService extends BaseService implements ITagService
{
    public function __construct(ITagRepository $tagRepo)
    {
        $this->repo = $tagRepo;
    }
}
