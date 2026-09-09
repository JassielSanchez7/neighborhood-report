<?php

namespace App\Filament\Resources\Incidences\Pages;

use App\Exports\IncidencesReportExport;
use App\Filament\Resources\Incidences\IncidenceResource;
use App\Models\Incidence;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListIncidences extends ListRecords
{
    protected static string $resource = IncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Action::make('reporte')
            ->label('Generar Reporte')
            ->icon('heroicon-o-document-arrow-down')
            ->action(function () {

                // dd($this->tableFilters);
                $filters = $this->tableFilters;

                $desde = data_get($filters, 'fecha.desde');
                $hasta = data_get($filters, 'fecha.hasta');
                $estado = data_get($filters, 'estado.status');

                

                $query = Incidence::query()
                    ->with([
                        'neighbor',
                        'typeIncidence'
                    ]);

                if ($desde) {
                    $query->whereDate('created_at', '>=', $desde);
                }

                if ($hasta) {
                    $query->whereDate('created_at', '<=', $hasta);
                }

                if ($estado) {
                    $query->where('status', $estado);
                }

                return Excel::download(
                    new IncidencesReportExport(
                        $query->get(),
                        [
                            'desde' => $desde,
                            'hasta' => $hasta,
                            'estado' => $estado,
                        ]
                    ),
                    'reporte-incidencias-' . now()->format('Y-m-d_H-i-s') . '.xlsx'
                );
            }),
        ];
    }
}
