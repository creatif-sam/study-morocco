<?php

namespace App\Filament\Resources\Intakes;

use App\Filament\Resources\Intakes\Pages\CreateIntake;
use App\Filament\Resources\Intakes\Pages\EditIntake;
use App\Filament\Resources\Intakes\Pages\ListIntakes;
use App\Filament\Resources\Intakes\Schemas\IntakeForm;
use App\Filament\Resources\Intakes\Tables\IntakesTable;
use App\Models\Intake;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IntakeResource extends Resource
{
    protected static ?string $model = Intake::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'start_date';

    public static function form(Schema $schema): Schema
    {
        return IntakeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IntakesTable::configure($table);
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
            'index' => ListIntakes::route('/'),
            'create' => CreateIntake::route('/create'),
            'edit' => EditIntake::route('/{record}/edit'),
        ];
    }
}
