<?php

namespace App\Filament\Widgets;

use App\Models\Incidence;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class IncidencesByMonthChart extends ChartWidget
{
    protected ?string $heading = 'Incidencias Ocurridas por Mes';

     protected int|string|array $columnSpan = 'full';


     protected static ?int $sort = 2;

     protected ?string $maxHeight = '480px';


    protected function getData(): array
    {

        $incidences = Incidence::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        $months = [
            1 => 'Ene',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Abr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Ago',
            9 => 'Sep',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'Dic',
        ];

        foreach ($incidences as $incidence) {
            $labels[] = $months[$incidence->month];
            $data[] = $incidence->total;
        }

        return [
            //
             'datasets' => [
                [
                    'label' => 'Incidencias',
                    'data' => $data,
                    'borderColor' => 'rgb(13, 110, 253)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
