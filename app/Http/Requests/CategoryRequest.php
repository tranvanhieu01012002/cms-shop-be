<?php

namespace App\Http\Requests;

class CategoryRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:2",
            "description" => "nullable",
            "file.*" => "nullable"
        ];
    }
}
