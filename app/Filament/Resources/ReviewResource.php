<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Автор')
                    ->required(),
                Select::make('services')
                    ->label('Сервис')
                    ->options([
                        '2gis' => '2gis',
                        'Яндекс' => 'Яндекс'
                    ])
                    ->required(),
                Textarea::make('text')
                    ->label('Текст карточки')
                    ->columnSpan(2)
                    ->required(),
                DateTimePicker::make('date')
                    ->label('Дата публикации'),
                TextInput::make('stars')
                    ->label('Оценка')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->step(0.5)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('date')
                    ->label('Дата публикации')
                    ->date()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Автор')
                    ->searchable(),
                TextColumn::make('services')
                    ->label('Сервис')
                    ->sortable(),
                TextColumn::make('stars')
                    ->label('Оценка')
                    ->sortable()
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
