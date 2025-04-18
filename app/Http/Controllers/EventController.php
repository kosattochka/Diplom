<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Detail\EventDetailResource;
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

// В EventController.php

    public function index(string $alias)
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $events = Event::query()
            ->where('vis', true)
            ->where('alias', $alias)
            ->with('paragraphs', function ($query) {
                return $query->where('vis', true)
                    ->orderByDesc('sort');
            })
            ->first();

        if ($events === null) {
            return redirect('/')->with('error', 'Событие не найдено');
        }

        $certificate = $events->img; // Предполагаем, что img — это поле модели Event

        $all = Event::query()
            ->whereNot('alias', $alias)
            ->get();

        return view('pages.detail-event', [
            'contacts' => $contacts,
            'events' => new EventDetailResource($events),
            'all' => CardResource::collection($all),
            'certificate' => $certificate,
        ]);
    }
}
