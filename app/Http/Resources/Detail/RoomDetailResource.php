<?php

namespace App\Http\Resources\Detail;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomDetailResource extends JsonResource
{

    public function toArray(Request $request): array
    {

        return [
            'title' => $this->title,
            'price' => $this->price,
            'price_extra_space' => $this->price_extra_space,
            'imgs' => array_map(function ($path) {
                return view('element.gallery', ['img'=>$path])->render();
            },json_decode($this->imgs)),
            'paragraphs'=>$this->paragraphs->map(function($item){
                $data = ['text'=>$item->text];
                if($item->title) $data['title'] = $item->title;
                return $data;
            })
        ];
    }
}
