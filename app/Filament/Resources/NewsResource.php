<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Filament\Tabs\ParagraphTab;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

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
                                FileUpload::make('img')
                                    ->label('Изображение')
                                    ->disk('public')
                                    ->columnSpan(2)
                                    ->required(),
                                Textarea::make('short_description')
                                    ->label('Текст карточки')
                                    ->columnSpan(2)
                                    ->required(),
                                DateTimePicker::make('date')
                                    ->label('Дата публикации'),
                            ]),
                        ParagraphTab::make()
                    ])
                ])
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
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('alias')
                    ->label('Ссылка')
                    ->searchable()
                    ->url(fn($state) => env('APP_URL') . '/news/' . $state, true),
                ImageColumn::make('img')
                    ->label('Изображение')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
