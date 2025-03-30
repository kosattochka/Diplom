<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
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
        return $alias;
    }
}
