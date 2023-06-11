<?php

namespace App\Traits;

trait ApiResponse
{
    public function response(
        array $data = [],
        string $message = "",
        int $code = 200
    ) {
        return response()->json([
            "status" => $this->getStatusFromCode($code),
            "message" => $message,
            "data" => $data
        ], $code);
    }

    public function getStatusFromCode(int $code = 200)
    {
        $status = [

            200 => "success",
            201 => "success",

            422 => "fail",
            404 => "fail",
            400 => "fail",
            500 => "fail",

        ];
        return $status[$code];
    }
}
