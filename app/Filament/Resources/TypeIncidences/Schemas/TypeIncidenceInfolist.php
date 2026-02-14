<?php

namespace App\Filament\Resources\TypeIncidences\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TypeIncidenceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('Nombre'),
                TextEntry::make('description')
                    ->label('Descripcion') 
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Creado') 
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Actualizado') 
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
