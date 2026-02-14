<?php

namespace App\Filament\Resources\Ratings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RatingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('incidence_id')
                    ->relationship('incidence', 'description')
                    ->required(),
                Select::make('neighbor_id')
                    ->relationship('neighbor', 'full_name')
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(5),
                Textarea::make('comment')
                    ->columnSpanFull(),
            ]);
    }
}
