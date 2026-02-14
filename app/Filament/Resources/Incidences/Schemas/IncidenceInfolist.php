<?php

namespace App\Filament\Resources\Incidences\Schemas;

use App\Models\Incidence;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class IncidenceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('neighbor.full_name')
                    ->label('Vecino'),
                TextEntry::make('typeIncidence.name')
                    ->label('Tipo de Incidencia')
                    ->placeholder('-'),
                TextEntry::make('description')
                    ->label('Descripcion'),
                ImageEntry::make('primaryImage.image_path')
                    ->label('Imagen(es) de Incidencia')
                    ->placeholder('-')
                    ->disk("public"),
                TextEntry::make('location')
                    ->label('Ubicacion'),
                TextEntry::make('status')
                    ->label('Estado')
                    ->badge(),
                TextEntry::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Incidence $record): bool => $record->trashed()),
            ]);
    }
}
