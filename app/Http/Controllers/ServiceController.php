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
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $service = Service::query()
            ->where('vis', true)
            ->orderBy('sort')
            ->whereNull('parent_id')
            ->get();
        $service = CardResource::collection($service);

        return view('pages.service', [
            'contacts' => $contacts,
            'service' => $this->convertObject($service)
        ]);
    }

    public function index(string $alias)
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();

        $service = Service::query()
            ->where('alias', $alias)
            ->where('vis', true)
            ->first();

        $all = Service::query()
            ->where('vis', true)
            ->whereNull('parent_id')
            ->whereNot('alias', $alias)
            ->get();
        $all = CardResource::collection($all);
        $all = $this->component('element.card.card', $all);

        // есть дочерние элементы - отображаем их список
        if (!empty($service->child()->get()->toArray())) {
            $child = CardResource::collection($service->child);
            return view('pages.service', [
                'contacts' => $contacts,
                'service' => $this->convertObject($child),
                'all' => $all,
                'title' => $service->title,
            ]);
        }
        // нет дочерних элементов - отображаем деталку
        else {
            return view('pages.detail-service', [
                'contacts' => $contacts,
                'service' => $service, // Передаем модель напрямую
                'all' => $all
            ]);
        }
    }
}
