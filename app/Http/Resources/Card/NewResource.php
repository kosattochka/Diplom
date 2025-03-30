<?php

namespace App\Http\Resources\Card;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'img' => $this->img,
            'date' => Carbon::parse($this->date)->format('d.m.y'),
            'title' => $this->title,
            'text' => $this->short_description,
            'link' => '/new/' . $this->alias
        ];
    }
}
