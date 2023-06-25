<?php

namespace App\Services\Category;

use App\Constants\RestfulRule;
use App\Repositories\Category\ICategoryRepository;
use App\Repositories\Media\IMediaRepository;
use App\Services\BaseService;
use Illuminate\Http\Request;

class CategoryService extends BaseService implements ICategoryService
{
    protected IMediaRepository $mediaRepo;

    public function __construct(
        ICategoryRepository $categoryRepo,
        IMediaRepository $mediaRepo
    ) {
        $this->repo = $categoryRepo;
        $this->mediaRepo = $mediaRepo;
    }

    public function create($attributes = [])
    {

        $category = $this->categoryRepo->create($attributes);
        if (isset($attributes["file"])) {

            $url = $this->createUrl($attributes["file"][0]);
            $category->media()->create(["path" => $url, "table_name" => "categories"]);

            ['url' => $url, 'headers' => ["Host" => [$host]]] = generateUploadUrl($url);
            $response["url"] = $url;
            $response["host"] = $host;
        }

        return $this->prepareData($response, 201, "create successful category!");
    }

    public function get(Request $request)
    {
        if ($request->has(RestfulRule::FIELDS)) {
           return parent::get($request);
        } else {
            $response = $this->repo->getEntityModel()->with("media")->paginate();
            return $this->prepareData($response, 200, "get successful");
        }
    }

    public function createUrl($nameFile)
    {
        $tableName = $this->repo->getEntityModel()->getTable();
        return  $tableName . "/" . $nameFile;
    }
}
