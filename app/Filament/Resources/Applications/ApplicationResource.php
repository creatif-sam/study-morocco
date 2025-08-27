<?php
namespace App\Filament\Resources\Applications;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

use App\Models\Application;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use UnitEnum;
use BackedEnum;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    // Correct type hints for Filament v4
    protected static UnitEnum|string|null $navigationGroup = 'Applications';
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';


            protected static ?string $recordTitleAttribute = 'application_no';

            public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
            {
                return $schema->schema([
                    Forms\Components\TextInput::make('application_no')
                        ->label('Application No')
                        ->required()
                        ->maxLength(50),
                    Forms\Components\Select::make('program_id')
                        ->relationship('program', 'title')
                        ->required(),
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required(),
                    Forms\Components\TextInput::make('status')
                        ->required()
                        ->default('pending'),
                ]);
            }

            public static function table(Tables\Table $table): Tables\Table
            {
                return $table
                    ->columns([
                        Tables\Columns\TextColumn::make('application_no')->sortable()->searchable(),
                        Tables\Columns\TextColumn::make('program.title')->label('Program'),
                        Tables\Columns\TextColumn::make('user.name')->label('User'),
                        Tables\Columns\TextColumn::make('status')->badge(),
                        Tables\Columns\TextColumn::make('created_at')->dateTime(),
                    ]);
            }

            public static function getPages(): array
            {
                return [
                    'index'  => Pages\ListApplications::route('/'),
                    'create' => Pages\CreateApplication::route('/create'),
                    'view'   => Pages\ViewApplication::route('/{record}'),
                    'edit'   => Pages\EditApplication::route('/{record}/edit'),
                ];
            }
        }
