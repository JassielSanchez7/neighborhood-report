<?php

namespace App\Filament\Resources\Neighbors;

use App\Filament\Resources\Neighbors\Pages\CreateNeighbor;
use App\Filament\Resources\Neighbors\Pages\EditNeighbor;
use App\Filament\Resources\Neighbors\Pages\ListNeighbors;
use App\Filament\Resources\Neighbors\Pages\ViewNeighbor;
use App\Filament\Resources\Neighbors\Schemas\NeighborForm;
use App\Filament\Resources\Neighbors\Schemas\NeighborInfolist;
use App\Filament\Resources\Neighbors\Tables\NeighborsTable;
use App\Models\Neighbor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class NeighborResource extends Resource
{

    protected static ?string $navigationLabel = 'Vecinos';
    protected static ?string $pluralModelLabel = 'Vecinos';
    protected static ?string $modelLabel = 'Vecino';

    protected static string | UnitEnum | null $navigationGroup = 'Gestion de Incidencias';

    protected static ?string $model = Neighbor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected static ?string $recordTitleAttribute = 'full_name';

    public static function form(Schema $schema): Schema
    {
        return NeighborForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NeighborInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NeighborsTable::configure($table);
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
            'index' => ListNeighbors::route('/'),
            'create' => CreateNeighbor::route('/create'),
            'view' => ViewNeighbor::route('/{record}'),
            'edit' => EditNeighbor::route('/{record}/edit'),
        ];
    }
}
