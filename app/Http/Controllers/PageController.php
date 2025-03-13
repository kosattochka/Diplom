<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Card\NewResource;
use App\Models\Album;
use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\Review;
use App\Models\Room;
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
            ->photos;
        $photo = json_decode($photo);

        return view('pages.index', [
            'contacts' => $contact,
            'certificate' => $event->img,
            'news' => $this->convertObject($news),
            'rooms' => $this->component('element.card', $room),
            'album' => $album
        ]);
    }
}
