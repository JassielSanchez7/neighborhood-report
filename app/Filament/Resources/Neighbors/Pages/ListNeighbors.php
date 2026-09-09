<?php

namespace App\Filament\Resources\Neighbors\Pages;

use App\Exports\NeighborsReportExport;
use App\Filament\Resources\Neighbors\NeighborResource;
use App\Models\Neighbor;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListNeighbors extends ListRecords
{
    protected static string $resource = NeighborResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('reporte')
            ->label('Descargar Reporte')
            ->icon('heroicon-o-document-arrow-down')
            ->action(function () {

                

                

                $query = Neighbor::query();


                return Excel::download(
                    new NeighborsReportExport(
                        $query->get()
                    ),
                    'reporte-vecinos-' . now()->format('Y-m-d_H-i-s') . '.xlsx'
                );
            }),
        ];
    }
}
