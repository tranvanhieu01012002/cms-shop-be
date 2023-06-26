<?php

namespace App\Http\Requests;

class ProductRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', 'min:10'],
            "description" => "nullable",
            "file.*" => ['min:3'],
            "file" => ['array'],
            "price" => ['required','integer'],
            "tax"=> ['nullable', 'regex:/^[0-9]+(\.[0-9][0-9]?)?$/'],
            "discount" => ['nullable', 'integer'],
            "sku" => ['required', 'min:3'],
            "quantity" => ['required','integer'],
            "barcode" => ['required','min:3'],
            "variation" => ['array'],
            "shipping" => ['nullable','array'],
            "category" => ['nullable','array'],
            "tag" => ['nullable','array'],
            "status" => ['nullable'],
        ];
    }
}
