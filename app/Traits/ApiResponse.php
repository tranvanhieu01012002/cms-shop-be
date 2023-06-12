<?php

namespace App\Traits;

trait ApiResponse
{
    public function response(
        mixed $data = [],
        int $code = 200,
        string $message = "",
    ) {
        return response()->json([
            "status" => $this->getStatusFromCode($code),
            "message" => $message,
            "data" => $data
        ], $code);
    }

    public function responseArray(array $array)
    {
        return $this->response($array["data"] ?? [], $array["code"] ?? 200, $array["message"] ?? "");
    }

    public function getStatusFromCode(int $code = 200)
    {
        $status = [
            200 => "success",
            201 => "success",

            401 => "fail",
            422 => "fail",
            404 => "fail",
            400 => "fail",
            500 => "fail",

        ];
        return $status[$code];
    }
}
