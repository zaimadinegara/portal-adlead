<?php

namespace App\Filament\Resources\ArticleSubmissions;

use App\Filament\Resources\ArticleSubmissions\Pages\CreateArticleSubmission;
use App\Filament\Resources\ArticleSubmissions\Pages\EditArticleSubmission;
use App\Filament\Resources\ArticleSubmissions\Pages\ListArticleSubmissions;
use App\Filament\Resources\ArticleSubmissions\Schemas\ArticleSubmissionForm;
use App\Filament\Resources\ArticleSubmissions\Tables\ArticleSubmissionsTable;
use App\Models\ArticleSubmission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArticleSubmissionResource extends Resource
{
    protected static ?string $model = ArticleSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $navigationLabel = 'Kiriman Tulisan';

    protected static ?string $pluralModelLabel = 'Kiriman Tulisan';

    public static function form(Schema $schema): Schema
    {
        return ArticleSubmissionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArticleSubmissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListArticleSubmissions::route('/'),
            'create' => CreateArticleSubmission::route('/create'),
            'edit' => EditArticleSubmission::route('/{record}/edit'),
        ];
    }
}
