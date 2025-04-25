<?php

namespace App\Filament\Tabs;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs\Tab;

class ImgsTab
{
    public static function make(): Tab
    {
        return Tab::make('Изображения')
            ->schema([
                FileUpload::make('imgs')
                    ->label('Изображения')
                    ->image()
                    ->disk('public')
                    ->multiple()
                    ->required()
            ]);
    }
}
