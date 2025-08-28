<?php

namespace App\Filament\Resources;

use App\Models\Blog;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    // ✅ same style as UserResource
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $recordTitleAttribute = 'title';

    /**
     * Form schema for creating / editing
     */
    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->unique(ignoreRecord: true),

            Textarea::make('excerpt'),

            FileUpload::make('cover_image')
                ->image()
                ->directory('blog-covers'),

            RichEditor::make('content')
                ->required()
                ->columnSpanFull(),

            Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            Toggle::make('published')
                ->default(false),
        ]);
    }

    /**
     * Table schema for listing
     */
    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('cover_image')->square(),
            TextColumn::make('title')->sortable()->searchable(),
            TextColumn::make('user.name')->label('Author')->sortable(),
            IconColumn::make('published')->boolean(),
            TextColumn::make('created_at')->dateTime('M d, Y'),
        ]);
    }

    /**
     * Resource pages (routes)
     */
    public static function getPages(): array
    {
        return [
            'index'  => BlogResource\Pages\ListBlogs::route('/'),
            'create' => BlogResource\Pages\CreateBlog::route('/create'),
            'edit'   => BlogResource\Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
