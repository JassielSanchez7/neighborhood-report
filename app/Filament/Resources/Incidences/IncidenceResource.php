<?php

namespace App\Filament\Resources\Incidences;

use App\Filament\Resources\Incidences\Pages\CreateIncidence;
use App\Filament\Resources\Incidences\Pages\EditIncidence;
use App\Filament\Resources\Incidences\Pages\ListIncidences;
use App\Filament\Resources\Incidences\Pages\ViewIncidence;
use App\Filament\Resources\Incidences\Schemas\IncidenceForm;
use App\Filament\Resources\Incidences\Schemas\IncidenceInfolist;
use App\Filament\Resources\Incidences\Tables\IncidencesTable;
use App\Models\Incidence;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class IncidenceResource extends Resource
{
    protected static ?string $navigationLabel = 'Incidencias';
    protected static ?string $pluralModelLabel = 'Incidencias';
    protected static ?string $modelLabel = 'Incidencia';

    protected static string | UnitEnum | null $navigationGroup = 'Gestion de Incidencias';


    protected static ?string $model = Incidence::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Schema $schema): Schema
    {
        return IncidenceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return IncidenceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IncidencesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIncidences::route('/'),
            'create' => CreateIncidence::route('/create'),
            'view' => ViewIncidence::route('/{record}'),
            'edit' => EditIncidence::route('/{record}/edit'),
        ];
    }
}
