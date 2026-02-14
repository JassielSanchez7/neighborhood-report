<?php

namespace App\Filament\Resources\Neighbors\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class NeighborForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([            
                Section::make('Informacion Personal')
                    ->schema([
                        TextInput::make('full_name')
                            ->label('Nombre Completo')
                            ->required(),
                        TextInput::make('email')
                            ->label('Correo Electronico')
                            ->email()
                            ->unique()
                            ->required(),
                        TextInput::make('dni')
                            ->label('DNI')
                            ->required(),
                        DateTimePicker::make('email_verified_at'),
                        
                        TextInput::make('phone')
                            ->label('Celular')
                            ->tel(),
                        Toggle::make('is_active')
                            ->required()
                            ->label('¿Está Activo?')
                            ->default(true),
                ])->columns(2)
                ->columnSpanFull(),

                
                Section::make('Seguridad')
                    ->schema([
                        TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->dehydrateStateUsing(fn($state):bool => filled($state)? Hash::make($state) : null)
                            ->dehydrated(fn($state): bool => filled($state))
                            ->required(fn(string $operation):bool => $operation === 'create')
                            ->revealable()
                            ->required(),

                        TextInput::make('password_confirmation')
                            ->label('Confirmar Contraseña')
                            ->password()
                            ->same('password')
                            ->revealable()
                            ->dehydrated(false)
                            ->required(fn(string $operation):bool => $operation === 'create')
                            
                ])->columns(2)
                ->columnSpanFull()

            ]);
    }
}
