<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Filament\Resources\AlbumResource\RelationManagers;
use App\Filament\Tabs\ImgsTab;
use App\Models\Album;
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
use Illuminate\Support\Str;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'lg' => 1,
                ])->schema([
                    Tabs::make('pages')->tabs([
                        Tab::make('Основное')
                            ->columns(2)
                            ->schema([
                                TextInput::make('title')
                                    ->label('Название')
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set) {
                                        $set('alias', Str::slug($state));
                                    })
                                    ->required(),
                                TextInput::make('alias')
                                    ->label('Ссылка')
                                    ->required(),
                                Textarea::make('description')
                                    ->label('Описание')
                                    ->columnSpan(2)
                                    ->required(),
                                TextInput::make('sort')
                                    ->label('Важность')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                                Toggle::make('vis')
                                    ->label('Активность')
                                    ->default(true)
                            ]),
                        ImgsTab::make()
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
                TextColumn::make('sort')
                    ->label('Важность')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('alias')
                    ->label('Ссылка')
                    ->searchable()
                    ->url(fn($state) => env('APP_URL') . '/gallery/' . $state, true),
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
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
