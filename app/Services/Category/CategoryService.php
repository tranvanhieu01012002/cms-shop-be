<?php

namespace App\Services\Category;

use App\Repositories\Category\ICategoryRepository;
use App\Repositories\Media\IMediaRepository;
use App\Traits\PrepareDataResponse;
use Illuminate\Support\Facades\Storage;

class CategoryService implements ICategoryService
{
    use PrepareDataResponse;

    protected ICategoryRepository $categoryRepo;

    protected IMediaRepository $mediaRepo;

    public function __construct(
        ICategoryRepository $categoryRepo,
        IMediaRepository $mediaRepo
    ) {
        $this->categoryRepo = $categoryRepo;
        $this->mediaRepo = $mediaRepo;
    }

    public function create($attributes = [])
    {
        $tableName = $this->categoryRepo->getEntityModel()->getTable();
        $url =  $tableName . "/" . $attributes["file"][0];

        // $response = $this->categoryRepo->create($attributes);
        // $file = $this->mediaRepo->create(["path" => $url]);

        // $response->media()->attach(
        //     $file->id,
        //     [
        //         "table" => $tableName
        //     ]
        // );
        
        ['url' => $url, 'headers' => ["Host" => [$host]]] = generateUploadUrl($url);
        $response["url"] = $url;
        $response["host"] = $host;

        return $this->prepareData($response, 201, "create successful category!");
    }
}
