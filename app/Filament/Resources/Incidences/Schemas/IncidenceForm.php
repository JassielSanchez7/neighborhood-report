<?php

namespace App\Filament\Resources\Incidences\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;


class IncidenceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informacion de Incidencia')
                    ->schema([
                        Select::make('neighbor_id')
                            ->label('Vecino')
                            ->relationship('neighbor', 'full_name')
                            ->required(),
                        Select::make('type_incidence_id')
                            ->label('Tipo')
                            ->relationship('typeIncidence', 'name'),
                        TextInput::make('description')
                            ->label('Descripcion')
                            ->required(),
                        TextInput::make('location')
                            ->label('Ubicación')
                            ->required(),
                            
                        ToggleButtons::make('status')
                            ->label('Estado')
                            ->options([
                                'pendiente' => 'Pendiente',
                                'en revision' => 'En revision',
                                'en proceso' => 'En proceso',
                                'resuelta' => 'Resuelta',
                                'cerrada' => 'Cerrada',
                            ])
                            ->default('pendiente')
                            ->required()
                            ->grouped()
                    ])->columnSpanFull()
                    ->columns(2),

                    Section::make('Imagenes de la Incidencia')
                    ->description('Sube imagenes de la incidencia.')
                    ->schema([
                        FileUpload::make('images')
                            ->label('Imagenes de la Incidencia')
                            ->multiple()
                            ->image()
                            ->directory('incidences/')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->reorderable()
                            ->columnSpanFull()
                            ->helperText("Puedes arrastrar y soltar las imágenes para reorganizarlas.")
                            ->saveRelationshipsUsing(function($component, $state, $record){
                                $record->images()->delete();

                                if(is_array($state)){
                                    foreach($state as $index => $imagePath){
                                        $record->images()->create([
                                            'image_path' => $imagePath,
                                        ]);
                                    };
                                }
                            })
                            ->dehydrated(false),
                    ])->columnSpanFull()

                ]);
                
    }
}
