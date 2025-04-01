<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\PaginatedResource;
use App\Models\Contact;
use App\Models\Event;

class EventController extends Controller
{
    public function many()
    {
        if (!request()->has('page'))
            return redirect('/event?page=1')
                ->with(session()->all());

        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $events = Event::query()
            ->where('vis', true)
            ->paginate(3);

        $events = CardResource::collection($events);
        $events = PaginatedResource::toFullArray($events);

        return view('pages.event', [
            'contacts' => $contacts,
            'events' => $events
        ]);
    }

    public function index(string $alias)
    {
        return $alias;
    }
}
