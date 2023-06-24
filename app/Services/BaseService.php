<?php

namespace App\Services;

use App\Constants\RestfulRule;
use App\Traits\PrepareDataResponse;
use Illuminate\Http\Request;

class BaseService
{
    use PrepareDataResponse;

    protected $repo;

    public function get(Request $request)
    {
        $response = $this->repo
            ->paginate(
                0,
                $request->has(RestfulRule::FIELDS)
                    ? explode(",", $request->get(RestfulRule::FIELDS))
                    : ["*"]
            );
        return $this->prepareData($response);
    }
}
