<?php

namespace App\Filament\Resources\TypeIncidences;

use App\Filament\Resources\TypeIncidences\Pages\CreateTypeIncidence;
use App\Filament\Resources\TypeIncidences\Pages\EditTypeIncidence;
use App\Filament\Resources\TypeIncidences\Pages\ListTypeIncidences;
use App\Filament\Resources\TypeIncidences\Pages\ViewTypeIncidence;
use App\Filament\Resources\TypeIncidences\Schemas\TypeIncidenceForm;
use App\Filament\Resources\TypeIncidences\Schemas\TypeIncidenceInfolist;
use App\Filament\Resources\TypeIncidences\Tables\TypeIncidencesTable;
use App\Models\TypeIncidence;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class TypeIncidenceResource extends Resource
{

    protected static ?string $navigationLabel = 'Tipos';
    protected static ?string $pluralModelLabel = 'Tipos de Incidencia';
    protected static ?string $modelLabel = 'Tipo de Incidencia';

    protected static string | UnitEnum | null $navigationGroup = 'Gestion de Incidencias';


    protected static ?string $model = TypeIncidence::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TypeIncidenceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TypeIncidenceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TypeIncidencesTable::configure($table);
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
            'index' => ListTypeIncidences::route('/'),
            'create' => CreateTypeIncidence::route('/create'),
            'view' => ViewTypeIncidence::route('/{record}'),
            'edit' => EditTypeIncidence::route('/{record}/edit'),
        ];
    }
}
