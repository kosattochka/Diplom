<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Detail\RuleDetailResource;
use App\Models\Contact;
use App\Models\Rule;

class RuleController extends Controller
{
    public function many()
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

    public function index(string $alias)
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $rule = Rule::query()
            ->where('alias', $alias)
            ->where('vis', true)
            ->first();

        $all = Rule::query()
            ->where('vis', true)
            ->whereNot('alias', $alias)
            ->get();
        $all = CardResource::collection($all);

        return view('pages.detail-rule', [
            'contacts' => $contacts,
            'rule' => new RuleDetailResource($rule),
            'all' => $this->component('element.card.card', $all),
        ]);
    }
}
