<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Detail\RoomDetailResource;
use App\Models\Contact;
use App\Models\Room;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function many()
    {
        if (request()->has('start_date', 'end_date', 'guests')) {
            $startDate = request()->start_date;
            $endDate = request()->end_date;
            $room = Room::where('capacity', '>=', request()->guests)
                ->whereDoesntHave('reservation', function ($query) use ($startDate, $endDate) {
                    $query->where(function ($q) use ($startDate, $endDate) {
                        $q->where('start_date', '<', $endDate)
                            ->where('end_date', '>', $startDate);
                    });
                })
                ->get();
        } else {
            $room = Room::query()->get();
        }
        $room = CardResource::collection($room);

        $contacts = Contact::where('vis', true)->first();

        return view('pages.placement', [
            'rooms' => $this->component('element.card.card', $room),
            'contacts' => $contacts,
        ]);
    }

    public function index(string $alias)
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();
        $room = Room::query()
            ->where('alias', $alias)
            ->with('paragraphs', function ($query) {
                return $query->where('vis', true)
                    ->orderByDesc('sort');
            })
            ->first();
        $room = new RoomDetailResource($room);
        $room = (object) $this->convertObject($room);

        $allRoom = Room::query()
            ->whereNot('alias', $alias)
            ->get();

        return view('pages.detail-room', [
            'contacts' => $contacts,
            'room' => $room,
            'phone' => $contacts->phone,
            'allRoom' => CardResource::collection($allRoom)
        ]);
    }
}
