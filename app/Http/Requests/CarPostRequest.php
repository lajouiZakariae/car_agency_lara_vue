<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarPostRequest extends FormRequest {
    protected $stopOnFirstFailure = true;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            "make" => "bail|required|max:255",
            "model" => "bail|required|max:255",
            "price" => "required|integer",
            "year" => "required|integer",
            "ready_to_sell" => "required|boolean",
            "inventory_id" => "required|integer",
            "category_id" => "required|integer",
            "user_id" => "required|integer"
        ];
    }
}
