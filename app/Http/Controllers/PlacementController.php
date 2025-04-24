<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Http\Resources\Card\CardResource;
use App\Http\Resources\Detail\RoomDetailResource;
use App\Models\Contact;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function many()
    {
        if (request()->has('start_date', 'end_date', 'guests')) {
            $startDate = request()->start_date;
            $endDate = request()->end_date;
            $room = Room::query()
                ->where('capacity', '>=', request()->guests)
                ->whereDoesntHave('reservation', function ($query) use ($startDate, $endDate) {
                    $query->where(function ($q) use ($startDate, $endDate) {
                        $q->where('start_date', '<', $endDate)
                            ->where('end_date', '>', $startDate);
                    });
                })
                ->get();
        } else {
            $room = Room::query()->get();
        }
        $room = CardResource::collection($room);

        $contacts = Contact::where('vis', true)->first();

        return view('pages.placement', [
            'rooms' => $this->component('element.card.card', $room),
            'contacts' => $contacts,
        ]);
    }

    public function index(string $alias)
    {
        $contacts = Contact::query()
            ->where('vis', true)
            ->first();
        $room = Room::query()
            ->where('alias', $alias)
            ->with('paragraphs', function ($query) {
                return $query->where('vis', true)
                    ->orderByDesc('sort');
            })
            ->first();

        if ($room == null)
            return redirect('/')->with('error', 'Такого номера не найдено');

        $room = new RoomDetailResource($room);
        $room = (object) $this->convertObject($room);

        $allRoom = Room::query()
            ->whereNot('alias', $alias)
            ->get();
        $allRoom = CardResource::collection($allRoom);

        return view('pages.detail-room', [
            'contacts' => $contacts,
            'room' => $room,
            'phone' => $contacts->phone,
            'allRoom' => $this->component('element.card.card', $allRoom)
        ]);
    }

    public function reserve(ReserveRequest $request)
    {
        $room = Room::query()
            ->where('alias', $request->alias)
            ->first();

        if ($room == null)
            return redirect()->back()->with('error', 'Такого номера не найдено');

        $room = Room::query()
            ->where('alias', $request->alias)
            ->where('capacity', '>=', request()->guests)
            ->whereDoesntHave('reservation', function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('start_date', '<', $request->end_date)
                        ->where('end_date', '>', $request->start_date);
                });
            })
            ->first();

        if ($room == null)
            return redirect()->back()->with('error', 'Простите, этот номер уже забронирован в этот день');

        $user = auth()->check() ? auth()->user()->id : null;

        Reservation::create([
            'room_id' => $room->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'name' => $request->name,
            'phone' => $request->phone,
            'guests' => $request->guests,
            'child' => $request->child,
            'user_id' => $user,
            'status' => 'new'
        ]);

        return redirect()->back()->with('msg', 'Ваша бронь зарегистрирована, скоро оператор свяжется с вами для подтверждения');
    }
}
