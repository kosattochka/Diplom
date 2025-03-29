<?php

namespace App\Http\Resources\Card;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'rating' => $this->stars,
            'date' => Carbon::parse($this->date)->format('d.m.Y'),
            'services' => $this->services,
            'text' => $this->text
        ];
    }
}
