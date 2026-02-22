<?php

namespace App\Filament\Resources\ArticleSubmissions\Pages;

use App\Filament\Resources\ArticleSubmissions\ArticleSubmissionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateArticleSubmission extends CreateRecord
{
    protected static string $resource = ArticleSubmissionResource::class;
}
