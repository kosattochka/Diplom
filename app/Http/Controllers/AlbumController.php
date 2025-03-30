<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
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
        return $alias;
    }
}
