<?php

namespace App\Traits;

trait PrepareDataResponse
{
    public function prepareData(
        mixed $data = [],
        int $code = 200,
        string $message = "",
    ) {
        return [
            "code" => $code,
            "message" => $message,
            "data" => $data,
        ];
    }

    public function prepareDataServerError(string $message)
    {
        return $this->prepareData([], 500, $message);
    }
}
