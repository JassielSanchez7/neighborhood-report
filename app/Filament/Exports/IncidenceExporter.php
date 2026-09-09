<?php

namespace App\Filament\Exports;

use App\Models\Incidence;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class IncidenceExporter extends Exporter
{
    protected static ?string $model = Incidence::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('neighbor.id')->label('Vecino'),
            ExportColumn::make('typeIncidence.name')->label('Tipo de Incidencia'),
            ExportColumn::make('description')->label('Descripcion'),
            ExportColumn::make('location')->label('Ubicacion'),
            ExportColumn::make('occurred_at')->label('Fecha de Incidencia'),
            ExportColumn::make('status')->label('Estado'),
            ExportColumn::make('created_at')->label('Fecha de Registro'),
            ExportColumn::make('updated_at')->label('Fecha de Actualizacion'),
            ExportColumn::make('deleted_at')->label('Fecha de Eliminacion'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'La exportación de incidencias se ha completado y se han exportado ' . Number::format($export->successful_rows) . ' filas';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
