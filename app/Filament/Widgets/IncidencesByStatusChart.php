<?php

namespace App\Filament\Widgets;

use App\Models\Incidence;
use Filament\Widgets\ChartWidget;

class IncidencesByStatusChart extends ChartWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Incidences por Estado';

    protected ?string $maxHeight = '280px';


    

    protected function getData(): array
    {
        $statuses = Incidence::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->get();
        
        return [
            //
            'datasets' => [
                [
                    'data' => $statuses->pluck('total')->toArray(),
                    'backgroundColor' => [
                        'rgb(255, 193, 7)',
                        'rgb(13, 110, 253)',
                        'rgb(25, 135, 84)',
                        'rgb(108, 117, 125)',
                    ]
                ],
            ],

            'labels' => $statuses->pluck('status')->toArray(),

        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
