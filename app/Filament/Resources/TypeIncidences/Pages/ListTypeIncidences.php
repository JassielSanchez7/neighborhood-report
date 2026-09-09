<?php

namespace App\Filament\Resources\TypeIncidences\Pages;

use App\Exports\TypeIncidencesReportExport;
use App\Filament\Resources\TypeIncidences\TypeIncidenceResource;
use App\Models\TypeIncidence;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListTypeIncidences extends ListRecords
{
    protected static string $resource = TypeIncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('reporte')
            ->label('Descargar Reporte')
            ->icon('heroicon-o-document-arrow-down')
            ->action(function () {

                

                

                $query = TypeIncidence::query();


                return Excel::download(
                    new TypeIncidencesReportExport(
                        $query->get()
                    ),
                    'reporte-tipo-de-incidencias-' . now()->format('Y-m-d_H-i-s') . '.xlsx'
                );
            }),
        ];
    }
}
