<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\NewResource;
use App\Http\Resources\Detail\NewDetailResource;
use App\Http\Resources\PaginatedResource;
use App\Models\Contact;
use App\Models\News;
use App\Models\Paragraph;

class NewsController extends Controller
{
    public function many()
    {
        if (!request()->has('page'))
            return redirect('/new?page=1')
                ->with(session()->all());

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
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $new = News::query()
            ->where('alias', $alias)
            ->with('paragraphs', function ($query) {
                return $query->where('vis', true)
                    ->orderByDesc('sort');
            })
            ->first();
        if($new === null)
            return redirect('/')->with('error', 'Новость не найдена');

        $next = News::query()
            ->where('date', '>', $new->date)
            ->orderBy('date')
            ->first(['alias', 'title']);
        $prev = News::query()
            ->where('date', '<', $new->date)
            ->orderByDesc('date')
            ->first(['alias', 'title']);

        return view('pages.detail-new', [
            'contacts' => $contacts,
            'new' => new NewDetailResource($new),
            'next' => $next ?? null,
            'prev' => $prev ?? null,
        ]);
    }
}
