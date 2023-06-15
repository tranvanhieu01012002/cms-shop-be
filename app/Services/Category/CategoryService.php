<?php

namespace App\Services\Category;

use App\Models\Category;
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

        $response = $this->categoryRepo->create($attributes);
        if (isset($attributes["file"])) {
            
            $url = $this->createUrl($attributes["file"][0]);
            $response->media()->create(["path" => $url]);

            ['url' => $url, 'headers' => ["Host" => [$host]]] = generateUploadUrl($url);
            $response["url"] = $url;
            $response["host"] = $host;
        }

        return $this->prepareData($response, 201, "create successful category!");
    }

    public function get()
    {
        $limit = 15;
        $response = $this->categoryRepo->getEntityModel()->with("media")->paginate($limit);
        return $this->prepareData($response, 200, "get successful");
    }

    public function createUrl($nameFile)
    {
        $tableName = $this->categoryRepo->getEntityModel()->getTable();
        return  $tableName . "/" . $nameFile;
    }
}
