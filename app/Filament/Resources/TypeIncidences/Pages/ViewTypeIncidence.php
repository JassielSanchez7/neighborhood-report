<?php

namespace App\Filament\Resources\TypeIncidences\Pages;

use App\Filament\Resources\TypeIncidences\TypeIncidenceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTypeIncidence extends ViewRecord
{
    protected static string $resource = TypeIncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
