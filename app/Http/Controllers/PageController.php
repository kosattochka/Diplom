<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Card\NewResource;
use App\Http\Resources\Card\ReviewResource;
use App\Http\Resources\PaginatedResource;
use App\Models\Album;
use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\Review;
use App\Models\Room;
use App\Models\Rule;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        if (!request()->has('gallery')) {
            $album = Album::first();
            return redirect('/?gallery=' . $album->alias);
        }

        $contact = Contact::query()
            ->where('vis', true)
            ->first();

        $event = Event::query()
            ->where('vis', true)
            ->orderBy('sort')
            ->first();

        $room = Room::query()
            ->get();
        $room = CardResource::collection($room);

        $news = News::query()
            ->orderBy('date')
            ->get()
            ->take(2);
        $news = NewResource::collection($news);

        $review = Review::query()
            ->select('services', DB::raw('AVG(stars) as average_stars'))
            ->groupBy('services')
            ->pluck('average_stars', 'services');

        $album = Album::query()
            ->where('vis', true)
            ->get()
            ->pluck('title', 'alias');

        $photo = Album::query()
            ->where('alias', request('gallery'))
            ->firstOrFail()
            ->imgs;
        $photo = json_decode($photo);

        $photo = array_map(function ($item) {
            return ['img' => $item];
        }, $photo);

        return view('pages.index', [
            'contacts' => $contact,
            'certificate' => $event->img,
            'news' => $this->convertObject($news),
            'rooms' => $this->component('element.card', $room),
            'album' => $album,
            'review' => $review,
            'photo' => $this->component('element.gallery', $photo),
            'event' => $event
        ]);
    }

    public function service()
    {
        $contact = Contact::query()
            ->where('vis', true)
            ->first();

        $service = Service::query()
            ->where('vis', true)
            ->orderBy('sort')
            ->get();
        $service = CardResource::collection($service);

        return view('pages.service', [
            'contacts' => $contact,
            'service' => $this->convertObject($service)
        ]);
    }

    public function rule()
    {
        $contact = Contact::query()
            ->where('vis', true)
            ->first();

        $rule = Rule::query()
            ->where('vis', true)
            ->orderBy('sort')
            ->get();
        $rule = CardResource::collection($rule);

        return view('pages.rule', [
            'contacts' => $contact,
            'rule' => $this->convertObject($rule)
        ]);
    }

    public function gallery()
    {
        $contact = Contact::query()
            ->where('vis', true)
            ->first();

        $photos = Album::query()
            ->where('vis', true)
            ->orderBy('sort')
            ->get();
        $photos = CardResource::collection($photos);

        return view('pages.gallery', [
            'contacts' => $contact,
            'photos' => $this->convertObject($photos)
        ]);
    }

    public function review()
    {
        if (!request()->has('year')) {
            $year = Review::query()
                ->where('vis', true)
                ->orderByDesc('date')
                ->first();
            $year = Carbon::parse($year->date)->year;

            return redirect('/review?year=' . $year);
        }

        $contact = Contact::query()
            ->where('vis', true)
            ->first();

        $rating = Review::query()
            ->select('services', DB::raw('AVG(stars) as average_stars'))
            ->groupBy('services')
            ->pluck('average_stars', 'services');

        $reviews = Review::query()
            ->where('vis', true)
            ->whereYear('date', request()->input('year'))
            ->orderByDesc('date')
            ->get();

        $reviews = ReviewResource::collection($reviews);
        $reviews = $this->convertObject($reviews);

        $years = Review::query()
            ->where('vis', true)
            ->selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year', 'year')
            ->toArray();

        return view('pages.review', [
            'contacts' => $contact,
            'rating' => $rating,
            'reviews' => $reviews,
            'years' => $years
        ]);
    }

    public function event()
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

    public function contact()
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        return view('pages.contact', [
            'contacts' => $contacts,
        ]);
    }

    public function new()
    {
        if (!request()->has('page'))
            return redirect('/new?page=1');

        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $news = News::query()
            ->orderByDesc('date')
            ->paginate(5);
        $news = NewResource::collection($news);
        $news = PaginatedResource::toFullArray($news);

        return view('pages.new', [
            'contacts' => $contacts,
            'news' => $news
        ]);
    }

    public function politics()
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        return view('pages.politics', [
            'contacts' => $contacts,
        ]);
    }

    public function placement()
    {
        $room = Room::query()
            ->get();
        $room = CardResource::collection($room);

        $contacts = Contact::where('vis', true)->first();

        return view('pages.placement', [
            'rooms' => $this->component('element.card', $room),
            'contacts' => $contacts,
        ]);
    }
}
