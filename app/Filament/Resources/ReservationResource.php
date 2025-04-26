<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationResource\Pages;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('Pages')->tabs([
                        Tab::make('Основное')
                            ->columns(2)
                            ->schema([
                                Hidden::make('room_id'),
                                TextInput::make('name')
                                    ->label('Имя')
                                    ->readOnly(),
                                TextInput::make('phone')
                                    ->label('Телефон')
                                    ->readOnly(),
                                TextInput::make('room.title')
                                    ->label('Комната')
                                    ->formatStateUsing(fn($get) => Room::find($get('room_id'))?->title)
                                    ->columnSpan(2)
                                    ->readOnly(),
                                TextInput::make('guests')
                                    ->label('Количество взрослых')
                                    ->readOnly(),
                                TextInput::make('child')
                                    ->label('Количество детей')
                                    ->readOnly(),
                                DatePicker::make('start_date')
                                    ->label('Дата заезда')
                                    ->readOnly(),
                                DatePicker::make('end_date')
                                    ->label('Дата выезда')
                                    ->readOnly(),
                            ]),
                        Tab::make('Данные номера')
                            ->columns(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Название')
                                    ->formatStateUsing(fn($get) => Room::find($get('room_id'))?->title)
                                    ->columnSpan(2)
                                    ->readOnly(),
                                TextInput::make('room.square')
                                    ->label('Площадь')
                                    ->formatStateUsing(fn($get) => Room::find($get('room_id'))?->square)
                                    ->readOnly(),
                                TextInput::make('room.capacity')
                                    ->label('Вместимость')
                                    ->formatStateUsing(fn($get) => Room::find($get('room_id'))?->capacity)
                                    ->readOnly(),
                                TextInput::make('room.price')
                                    ->label('Цена')
                                    ->formatStateUsing(fn($get) => Room::find($get('room_id'))?->price)
                                    ->readOnly(),
                                TextInput::make('room.price_extra_space')
                                    ->label('Доп место')
                                    ->formatStateUsing(fn($get) => Room::find($get('room_id'))?->price_extra_space)
                                    ->readOnly(),
                            ]),
                        Tab::make('Подтверждение')
                            ->columns(2)
                            ->schema([
                                Select::make('status')
                                    ->label('Статус')
                                    ->required()
                                    ->options([
                                        'new' => 'Новый',
                                        'confirmed' => 'Подтверждён',
                                        'completed' => 'В архиве',
                                        'cancelled' => 'Отменённый'
                                    ]),
                                TextInput::make('price')
                                    ->label('К оплате')
                                    ->formatStateUsing(function ($get) {
                                        $room = Room::find($get('room_id'));
                                        // Получаем даты из бронирования
                                        $startDate = Carbon::parse($get('start_date'));
                                        $endDate = Carbon::parse($get('end_date'));

                                        // Рассчитываем сумму к оплате
                                        $days = $endDate->diffInDays($startDate);
                                        $capacity = explode('-', $room->capacity);
                                        $capacity = (int) end($capacity);
                                        $extraGuests = max(0, $get('guests') + $get('child') - $capacity);
                                        return $days * ($room->price + $extraGuests * $room->price_extra_space);
                                    })
                                    ->readOnly()
                            ])
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('status')
                    ->label('Статус')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        switch ($state) {
                            case 'new':
                                return 'Новый';
                            case 'confirmed':
                                return 'Подтверждён';
                            case 'completed':
                                return 'В архиве';
                            case 'cancelled':
                                return 'Отменённый';
                        }
                    }),
                TextColumn::make('start_date')
                    ->label('Дата заезда')
                    ->date()
                    ->sortable(),
                TextColumn::make('end_date')
                    ->label('Дата выезда')
                    ->date()
                    ->sortable(),
                TextColumn::make('room.title')
                    ->label('Забронированная комната')
                    ->searchable()
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Статус')
                    ->options([
                        'new' => 'Новый',
                        'confirmed' => 'Подтверждён',
                        'completed' => 'В архиве',
                        'cancelled' => 'Отменённый'
                    ])
                    ->multiple()
                    ->searchable(),

                SelectFilter::make('room')
                    ->label('Комната')
                    ->relationship('room', 'title')
                    ->searchable()
                    ->preload(),

                Filter::make('dates')
                    ->label('Даты бронирования')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('С'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('По'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when(
                                $data['start_date'],
                                fn($q) => $q->where('start_date', '>=', $data['start_date'])
                            )
                            ->when(
                                $data['end_date'],
                                fn($q) => $q->where('end_date', '<=', $data['end_date'])
                            );
                    }),

                Filter::make('actual')
                    ->label('Текущие бронирования')
                    ->query(fn(Builder $query) => $query
                        ->where('status', 'confirmed')
                        ->where('end_date', '>=', now()))
            ])
            ->persistFiltersInSession()
            ->filtersApplyAction(
                fn() => Tables\Actions\Action::make('apply')
                    ->button()
                    ->label('Применить'),
            )
            ->actions([
                Tables\Actions\EditAction::make('Подробнее'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
