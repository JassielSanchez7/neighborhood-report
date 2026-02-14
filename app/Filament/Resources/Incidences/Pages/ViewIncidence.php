<?php

namespace App\Filament\Resources\Incidences\Pages;

use App\Filament\Resources\Incidences\IncidenceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewIncidence extends ViewRecord
{
    protected static string $resource = IncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
