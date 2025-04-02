<?php

namespace App\Http\Resources\Detail;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'img'=>$this->img,
            'paragraphs'=>$this->paragraphs->map(function($item){
                $data = ['text'=>$item->text];
                if($item->title) $data['title'] = $item->title;
                return $data;
            }),
        ];
    }
}
