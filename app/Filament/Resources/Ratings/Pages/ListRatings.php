<?php

namespace App\Filament\Resources\Ratings\Pages;

use App\Exports\RatingsReportExport;
use App\Filament\Resources\Ratings\RatingResource;
use App\Models\Rating;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListRatings extends ListRecords
{
    protected static string $resource = RatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            Action::make('reporte')
            ->label('Descargar Reporte')
            ->icon('heroicon-o-document-arrow-down')
            ->action(function () {

                

                

                $query = Rating::query();


                return Excel::download(
                    new RatingsReportExport(
                        $query->get()
                    ),
                    'reporte-calificaciones-' . now()->format('Y-m-d_H-i-s') . '.xlsx'
                );
            }),
        ];
    }
}
