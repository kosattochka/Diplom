<?php

namespace App\Http\Resources\Detail;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RuleDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'service' => $this->service,
            'price' => $this->price,
        ];

    }
}
