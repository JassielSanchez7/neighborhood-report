<?php

namespace App\Filament\Resources\Neighbors\Schemas;

use App\Models\Neighbor;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class NeighborInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('full_name')
                    ->label('Nombre Completo'),
                TextEntry::make('email')
                    ->label('Correo Electronico'),
                TextEntry::make('dni'),
                TextEntry::make('email_verified_at')
                    ->label('Email verificado')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->label('Celular')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->label('¿Esta activo?')
                    ->boolean(),
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
                    ->visible(fn (Neighbor $record): bool => $record->trashed()),
            ]);
    }
}
