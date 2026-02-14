<?php

namespace App\Filament\Resources\TypeIncidences\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;


class TypeIncidenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Información de Tipo de Incidencia')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required(),
                        Textarea::make('description')
                            ->label('Descripcion')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
                
            ]);
    }
}
