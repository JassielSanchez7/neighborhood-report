<?php

namespace App\Filament\Resources\Ratings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RatingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('incidence.description')
                    ->label('Incidencia'),
                TextEntry::make('neighbor.full_name')
                    ->label('Vecino'),
                TextEntry::make('rating')
                    ->label('Calificacion')
                    ->numeric(),
                TextEntry::make('comment')
                    ->label('comentario')
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
