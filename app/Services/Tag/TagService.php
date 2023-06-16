<?php

namespace App\Services\Tag;

use App\Repositories\Tag\ITagRepository;
use App\Services\BaseService;

class TagService extends BaseService implements ITagService
{
    public function __construct(ITagRepository $tagRepo)
    {
        $this->repo = $tagRepo;
    }
} 
