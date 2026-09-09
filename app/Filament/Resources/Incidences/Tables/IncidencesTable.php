<?php

namespace App\Filament\Resources\Incidences\Tables;

use App\Filament\Exports\IncidenceExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class IncidencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('neighbor.full_name')
                    ->label('Vecino')
                    ->searchable(),
                TextColumn::make('typeIncidence.name')
                    ->label('Tipo de Incidencia')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Descripción')
                    ->searchable(),
                ImageColumn::make('primaryImage.image_path')
                    ->label('Imagen')
                    ->disk('public')
                    ->defaultImageUrl(url('/images/placeholder.png')),
                TextColumn::make('location')
                    ->label('Ubicación')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                
                 Filter::make('fecha')
                    ->form([
                        DatePicker::make('desde'),
                        DatePicker::make('hasta'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when(
                                $data['desde'],
                                fn($q) => $q->whereDate('created_at', '>=', $data['desde'])
                            )
                            ->when(
                                $data['hasta'],
                                fn($q) => $q->whereDate('created_at', '<=', $data['hasta'])
                            );
                    }),

                

                Filter::make('estado')
                    ->form([
                        Select::make('status')
                            ->options([
                                'pendiente' => 'pendiente',
                                'en revision' => 'en revision',
                                'en proceso' => 'En proceso',
                                'resuelta' => 'Resuelta',
                                'cerrada' => 'Cerrada',
                            ]),
                    ])
                    ->query(fn ($query, array $data) =>
                        $query->when(
                            $data['status'],
                            fn($q) => $q->where('status', $data['status'])
                        )
                    ),


                
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Exportar Excel')
                    ->exporter(IncidenceExporter::class),
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
