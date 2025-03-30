<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Models\Contact;
use App\Models\Room;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function many()
    {
        $room = Room::query()
            ->get();
        $room = CardResource::collection($room);

        $contacts = Contact::where('vis', true)->first();

        return view('pages.placement', [
            'rooms' => $this->component('element.card.card', $room),
            'contacts' => $contacts,
        ]);
    }

    public function index(string $alias)
    {
        return $alias;
    }
}
