<?php

namespace App\Http\Resources\Card;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $room = $this->room;

        // Получаем даты из бронирования
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);

        // Рассчитываем сумму к оплате
        $days = $endDate->diffInDays($startDate);
        $capacity = explode('-', $room->capacity);
        $capacity = (int) end($capacity);
        $extraGuests = max(0, $this->guests + $this->child - $capacity);
        $score = $days * ($room->price + $extraGuests * $room->price_extra_space);

        return [
            'img' => $room->imgs[0],
            'title' => $room->title,
            'start_date' => $startDate->format('d.m.y'),
            'end_date' => $endDate->format('d.m.y'),
            'created_at' => Carbon::parse($this->created_at)->format('d.m.y'),
            'price' => $room->price,
            'score' => $score,
        ];
    }
}
