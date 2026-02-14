<?php

namespace App\Filament\Resources\Incidences\Pages;

use App\Filament\Resources\Incidences\IncidenceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIncidences extends ListRecords
{
    protected static string $resource = IncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
