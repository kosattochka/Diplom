<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\Room;
use Illuminate\Http\Request;

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

        $news = News::query()
            ->orderBy('date')
            ->get()
            ->take(2);

        $album = Album::query()
            ->where('alias', request('gallery'))
            ->firstOrFail()
            ->photos;
        $album = json_decode($album);
        return view('pages.index');
    }
}
