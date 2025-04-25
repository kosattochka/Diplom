<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('pages')->tabs([
                        Tab::make('Адреса')
                            ->schema([
                                TextInput::make('address_office')
                                    ->label('Адрес офиса')
                                    ->required(),
                                TextInput::make('address_place')
                                    ->label('Адрес базы')
                                    ->required(),
                                Toggle::make('vis')
                                    ->label('Активность')
                                    ->default(true)
                            ]),
                        Tab::make('Контакты')
                            ->schema([
                                TextInput::make('phone')
                                    ->label('Телефон')
                                    ->required(),
                                TextInput::make('operator')
                                    ->label('Номер оператора')
                                    ->required(),
                                TextInput::make('email')
                                    ->label('Почта')
                                    ->email()
                                    ->required(),
                                TextInput::make('vk')
                                    ->label('Вконтакте')
                                    ->url()
                                    ->required(),
                                TextInput::make('telegram')
                                    ->label('Телеграм')
                                    ->url()
                                    ->required()
                            ]),
                        Tab::make('Карты')
                            ->schema([
                                Textarea::make('map')
                                    ->label('Карта')
                                    ->required(),
                                Textarea::make('map_route')
                                    ->label('Маршруты')
                                    ->required(),
                            ])
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('vis')
                    ->label('Активность'),
                TextColumn::make('phone')
                    ->label('Телефон'),
                TextColumn::make('email')
                    ->label('Почта'),
                TextColumn::make('address_office')
                    ->label('Адрес офиса'),
                TextColumn::make('address_place')
                    ->label('Адрес базы')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}
