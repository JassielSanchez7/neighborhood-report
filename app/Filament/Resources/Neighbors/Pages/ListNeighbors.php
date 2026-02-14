<?php

namespace App\Filament\Resources\Neighbors\Pages;

use App\Filament\Resources\Neighbors\NeighborResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListNeighbors extends ListRecords
{
    protected static string $resource = NeighborResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
