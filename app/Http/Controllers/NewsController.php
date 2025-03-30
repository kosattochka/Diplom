<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\NewResource;
use App\Http\Resources\PaginatedResource;
use App\Models\Contact;
use App\Models\News;

class NewsController extends Controller
{
    public function many()
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

    public function index(string $alias)
    {
        return $alias;
    }
}
