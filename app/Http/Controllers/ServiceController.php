<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Detail\ServiceDetailResource;
use App\Models\Contact;
use App\Models\Service;

class ServiceController extends Controller
{
    public function many()
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

    public function index(string $alias)
    {
        $contacts = Contact::query()
        ->where('vis', true)
        ->first();

        $service = Service::query()
        ->where('vis', true)
        ->first();

        return view('pages.detail-service', [
            'contacts' => $contacts,
            'service' => new ServiceDetailResource($service),
        ]);
    }
}
