<?php

namespace App\Filament\Resources;

use App\Models\User;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\DateTimePicker;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    // ✅ Correct type for 4.x-dev (string or BackedEnum)
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-user';

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Form schema for creating / editing
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->required()
                ->email()
                ->maxLength(255),

            TextInput::make('password')
                ->password()
                ->required(fn ($record) => $record === null) // required only when creating
                ->maxLength(255),

            DateTimePicker::make('email_verified_at'),
        ]);
    }

    /**
     * Table schema for listing
     */
    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->sortable()->searchable(),
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('email')->sortable()->searchable(),
            TextColumn::make('created_at')->dateTime()->sortable(),
            TextColumn::make('updated_at')->dateTime()->sortable(),
        ]);
    }

    /**
     * Resource pages (routes)
     */
    public static function getPages(): array
    {
        return [
            'index'  => UserResource\Pages\ListUsers::route('/'),
            'create' => UserResource\Pages\CreateUser::route('/create'),
            'edit'   => UserResource\Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
