<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Detail\EventDetailResource;
use App\Http\Resources\PaginatedResource;
use App\Models\Contact;
use App\Models\Event;
use Illuminate\Support\Facades\Cookie;

class EventController extends Controller
{
    public function many()
    {
        if (!request()->has('page'))
            return redirect('/event?page=1');

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
        if (!request()->has('page'))
            return redirect(request()->url() . '?page=1');

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
            Cookie::queue('error', 'Событие не найдено', 10);
            return redirect('/');
        }

        $events = $this->convertObject(new EventDetailResource($events));
        $events = (object) $events;

        $all = Event::query()
            ->whereNot('alias', $alias)
            ->where('vis', true)
            ->paginate(3);
        $all = CardResource::collection($all);
        $all = PaginatedResource::toFullArray($all);


        return view('pages.detail-event', [
            'contacts' => $contacts,
            'events' => $events,
            'all' => $all
        ]);
    }
}
