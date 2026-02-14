<?php

namespace App\Filament\Resources\TypeIncidences\Pages;

use App\Filament\Resources\TypeIncidences\TypeIncidenceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTypeIncidence extends EditRecord
{
    protected static string $resource = TypeIncidenceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
