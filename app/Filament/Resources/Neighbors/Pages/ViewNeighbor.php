<?php

namespace App\Filament\Resources\Neighbors\Pages;

use App\Filament\Resources\Neighbors\NeighborResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNeighbor extends ViewRecord
{
    protected static string $resource = NeighborResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
