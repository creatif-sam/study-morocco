<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('program_id')
                    ->numeric(),
                TextEntry::make('intake_id')
                    ->numeric(),
                TextEntry::make('assigned_agent_id')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('decision'),
                TextEntry::make('decision_at')
                    ->dateTime(),
                TextEntry::make('application_no'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
