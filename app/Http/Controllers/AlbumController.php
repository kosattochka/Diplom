<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Detail\AlbumDetailResource;
use App\Models\Album;
use App\Models\Contact;

class AlbumController extends Controller
{
    public function many()
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

    public function index(string $alias)
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $photos = Album::query()
            ->where('vis', true)
            ->where('alias', $alias)
            ->first();

        if ($photos === null)
            return redirect('/')
                ->with(session()->all())
                ->with('error', 'Альбом не найден');

        $all = Album::query()
            ->where('vis', true)
            ->whereNot('alias', $alias)
            ->get();
        $all = CardResource::collection($all);

        return view('pages.detail-gallery', [
            'contacts' => $contacts,
            'photos' => new AlbumDetailResource($photos),
            'all' => $this->component('element.card.card', $all)
        ]);
    }
}
