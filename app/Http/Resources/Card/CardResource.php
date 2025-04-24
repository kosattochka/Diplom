<?php

namespace App\Http\Resources\Card;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $img = isset($this->imgs) ?
            json_decode($this->imgs, true)[0] :
            $this->img;

        if (!isset($request->alias)) {
            $link = $request->getPathInfo() == '/' ?
                '/placement/' . $this->alias :
                $request->getPathInfo() . '/' . $this->alias;
        } else {
            $url = preg_replace('#/[^/]+$#', '', $request->getPathInfo());
            $link = $url == '/' ?
                '/placement/' . $this->alias :
                $url . '/' . $this->alias;
        }

        $data = [
            'img' => $img,
            'name' => $this->title,
            'text' => $this->description,
            'link' => $link,

        ];

        if (isset($this->square, $this->capacity)) {
            $data['square'] = $this->square;
            $data['capacity'] = $this->capacity;
        }

        return $data;
    }
}
