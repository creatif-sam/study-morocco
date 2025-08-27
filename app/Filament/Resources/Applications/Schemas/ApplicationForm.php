<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('intake_id')
                    ->numeric(),
                TextInput::make('assigned_agent_id')
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                TextInput::make('decision'),
                DateTimePicker::make('decision_at'),
                TextInput::make('application_no')
                    ->required(),
            ]);
    }
}
