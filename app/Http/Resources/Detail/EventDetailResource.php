<?php

namespace App\Http\Resources\Detail;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'certificate' => $this->img,
            'contacts' => $this->contacts,
            'title'=> $this->title,
            'paragraphs'=>$this->paragraphs->map(function($item){
                $data = ['text'=>$item->text];
                if($item->title) $data['title'] = $item->title;
                return $data;
            }),


        ];
    }
}
