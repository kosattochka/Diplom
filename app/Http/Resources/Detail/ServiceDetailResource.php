<?php

namespace App\Http\Resources\Detail;

use App\Http\Resources\Card\CardResource;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'img' => $this->img,
            'square' => $this->square,
            'capacity' => $this->capacity,
            'text' => $this->text,
        ];
    }
}
