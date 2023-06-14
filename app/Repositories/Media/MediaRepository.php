<?php

namespace App\Repositories\Media;

use App\Models\Media;
use App\Repositories\BaseRepository;

class MediaRepository extends BaseRepository implements IMediaRepository
{
    public function getModel()
    {
        return Media::class;
    }
}
