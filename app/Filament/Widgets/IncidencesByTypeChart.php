<?php

namespace App\Filament\Widgets;

use App\Models\TypeIncidence;
use Filament\Widgets\ChartWidget;

class IncidencesByTypeChart extends ChartWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Incidencias por Tipo';
    
    

    protected function getData(): array
    {

        $types = TypeIncidence::withCount('incidences')->get();

        return [
            //
            'datasets' => [
                [
                    'label' => 'Cantidad de incidencias',
                    'data' => $types->pluck('incidences_count')->toArray(),
                    'backgroundColor' => 'rgb(177, 208, 134)',
                ],
            ],
            'labels' => $types->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
