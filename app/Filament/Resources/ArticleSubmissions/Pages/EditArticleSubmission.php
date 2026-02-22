<?php

namespace App\Filament\Resources\ArticleSubmissions\Pages;

use App\Filament\Resources\ArticleSubmissions\ArticleSubmissionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditArticleSubmission extends EditRecord
{
    protected static string $resource = ArticleSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
