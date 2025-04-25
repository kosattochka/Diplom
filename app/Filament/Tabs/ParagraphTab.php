<?php

namespace App\Filament\Tabs;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class ParagraphTab
{
    public static function make(): Tab
    {
        return Tab::make('Контент страницы')
            ->schema([
                Repeater::make('paragraphs')
                    ->label('Абзацы')
                    ->relationship('paragraphs')
                    ->required()
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Заголовок')
                            ->columnSpan(2),
                        Textarea::make('text')
                            ->label('Текст')
                            ->columnSpan(2)
                            ->required(),
                        TextInput::make('sort')
                            ->label('Важность')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        Toggle::make('vis')
                            ->label('Отображать')
                            ->default(true),
                    ])
            ]);
    }
}
