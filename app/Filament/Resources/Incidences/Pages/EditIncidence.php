<?php

namespace App\Filament\Resources\Incidences\Pages;

use App\Filament\Resources\Incidences\IncidenceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditIncidence extends EditRecord
{
    protected static string $resource = IncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
