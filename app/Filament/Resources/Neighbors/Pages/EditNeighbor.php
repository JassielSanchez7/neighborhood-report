<?php

namespace App\Filament\Resources\Neighbors\Pages;

use App\Filament\Resources\Neighbors\NeighborResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditNeighbor extends EditRecord
{
    protected static string $resource = NeighborResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
