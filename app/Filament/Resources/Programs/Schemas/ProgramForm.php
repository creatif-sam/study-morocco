<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('institution_id')
                    ->label('Institution')
                    ->relationship('institution', 'name')
                    ->required(),
                TextInput::make('level')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('language')
                    ->required(),
                TextInput::make('tuition')
                    ->numeric(),
                TextInput::make('duration'),
                TextInput::make('slug')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('requirements')
                    ->label('Requirements (JSON)')
                    ->required(false)
                    ->helperText('Enter valid JSON, e.g. ["Bac"] or {"min_grade":12}')
                    ->rule('json'),
            ]);
    }
}
