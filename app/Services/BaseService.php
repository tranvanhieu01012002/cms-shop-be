<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Traits\PrepareDataResponse;
use App\Constants\RestfulRule;

class BaseService implements IGetActionService
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
