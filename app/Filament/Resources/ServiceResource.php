<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
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
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Label;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

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
                                FileUpload::make('img')
                                    ->label('Изображение')
                                    ->disk('public')
                                    ->columnSpan(2)
                                    ->required(),
                                TextInput::make('sort')
                                    ->label('Важность')
                                    ->numeric()
                                    ->default(0)
                                    ->required(),
                                Select::make('parent')
                                    ->Label('Родительская услуга')
                                    ->relationship('parent')
                                    ->options(Service::all()->pluck('title', 'id')),
                                Toggle::make('vis')
                                    ->label('Активность')
                                    ->default(true)
                            ]),
                        Tab::make('Детальная страница')
                            ->schema([
                                Textarea::make('page_description')
                                    ->label('Текст баннера')
                                    ->required(),
                                Textarea::make('page_heading')
                                    ->label('Заголовок после баннера')
                                    ->required(),
                                Repeater::make('table_price')
                                    ->label('Таблица')
                                    ->columns(4)
                                    ->required()
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Название')
                                            ->required(),
                                        TextInput::make('value1')
                                            ->label('Значения')
                                            ->required(),
                                        TextInput::make('value2')
                                            ->label('Значения')
                                            ->required(),
                                        TextInput::make('value3')
                                            ->label('Значения')
                                            ->required(),
                                    ]),
                                Textarea::make('page_text')
                                    ->label('Текст страницы')
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
                    ->label('Активность')
                    ->sortable(),
                TextColumn::make('sort')
                    ->label('Важность')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable(),
                TextColumn::make('alias')
                    ->label('Ссылка')
                    ->searchable()
                    ->url(fn($state) => env('APP_URL') . '/service/' . $state, true),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
