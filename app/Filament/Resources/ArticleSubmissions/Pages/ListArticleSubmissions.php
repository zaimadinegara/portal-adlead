<?php

namespace App\Filament\Resources\ArticleSubmissions\Pages;

use App\Filament\Resources\ArticleSubmissions\ArticleSubmissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArticleSubmissions extends ListRecords
{
    protected static string $resource = ArticleSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
