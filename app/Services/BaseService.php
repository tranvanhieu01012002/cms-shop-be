<?php

namespace App\Services;

use App\Constants\Pagination;
use App\Constants\RestfulRule;
use App\Traits\PrepareDataResponse;
use Illuminate\Http\Request;

class BaseService
{
    use PrepareDataResponse;

    protected $repo;
    protected $resourceCollection;

    public function index(Request $request)
    {
        $columns = explode(',', $request->get(RestfulRule::FIELDS, '*'));
        $response = $this->repo->paginate($columns);
        return $this->prepareData(new $this->resourceCollection($response));
    }

    public function getAll(Request $request)
    {
        $columns = explode(',', $request->get(RestfulRule::FIELDS, '*'));
        $response = $this->repo->getAll($columns);
        return $this->prepareData($response);
    }
}
