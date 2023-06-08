<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            "id" => $this->id,
            "make" => $this->make,
            "model" => $this->model,
            "year" => $this->year,
            "price" => $this->price,
            "readyToSell" => $this->ready_to_sell,
            // "cate"
        ];
    }
}
