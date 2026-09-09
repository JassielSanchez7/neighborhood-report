<?php

namespace App\Filament\Widgets;

use App\Models\Incidence;
use Filament\Widgets\Widget;

class IncidencesMap extends Widget
{
    protected string $view = 'filament.widgets.incidences-map';
    protected int|string|array $columnSpan = 'full';
    // protected static ?int $sort = 3;

    public function getViewData(): array
    {
        return [
            'incidences' => Incidence::select(
                'id',
                'description',
                'location',
                'type_incidence_id',
                'latitude',
                'longitude'
            )
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->get(),
        ];
    }


}
