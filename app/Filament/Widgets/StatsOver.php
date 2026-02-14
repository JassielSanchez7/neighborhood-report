<?php

namespace App\Filament\Widgets;

use App\Models\Incidence;
use App\Models\Neighbor;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOver extends StatsOverviewWidget
{

    protected ?string $pollingInterval = '10s';


    protected function getStats(): array
    {

        $totalIncidences = Incidence::count();
        $totalNeighbor = Neighbor::count();

        return [
            Stat::make('Total Incidencias', $totalIncidences)
                ->description('Pendientes' . '3')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            Stat::make('Total Vecinos', $totalNeighbor)
                ->description('Nuevos' . '1')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),
            Stat::make('Incidencias Pendientes', '3')
                ->color('success'),
            Stat::make('Total Calificaciones', '1')
                ->description('Nuevos' . '1')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('info'),


        ];
    }
}
