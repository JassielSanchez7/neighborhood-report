<?php

namespace App\Filament\Resources\TypeIncidences\Pages;

use App\Filament\Resources\TypeIncidences\TypeIncidenceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTypeIncidences extends ListRecords
{
    protected static string $resource = TypeIncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
