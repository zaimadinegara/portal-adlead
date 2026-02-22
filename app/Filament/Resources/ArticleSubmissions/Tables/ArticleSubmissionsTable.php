<?php

namespace App\Filament\Resources\ArticleSubmissions\Tables;

use App\Models\ArticleSubmission;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ArticleSubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->limit(60),

                TextColumn::make('name')
                    ->label('Penulis')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->placeholder('-'),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => ArticleSubmission::STATUS_PENDING,
                        'info' => ArticleSubmission::STATUS_REVIEWED,
                        'success' => ArticleSubmission::STATUS_ACCEPTED,
                        'danger' => ArticleSubmission::STATUS_REJECTED,
                    ]),

                TextColumn::make('created_at')
                    ->label('Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
