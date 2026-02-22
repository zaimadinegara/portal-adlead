<?php

namespace App\Filament\Resources\ArticleSubmissions\Schemas;

use App\Models\ArticleSubmission;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ArticleSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(120),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(190),

                TextInput::make('whatsapp')
                    ->label('WhatsApp')
                    ->maxLength(40),

                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(190)
                    ->columnSpanFull(),

                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        ArticleSubmission::STATUS_PENDING => 'Pending',
                        ArticleSubmission::STATUS_REVIEWED => 'Reviewed',
                        ArticleSubmission::STATUS_ACCEPTED => 'Accepted',
                        ArticleSubmission::STATUS_REJECTED => 'Rejected',
                    ])
                    ->required(),

                Textarea::make('content')
                    ->label('Naskah')
                    ->required()
                    ->rows(14)
                    ->columnSpanFull(),

                Textarea::make('bio')
                    ->label('Bio Penulis')
                    ->rows(4)
                    ->columnSpanFull(),

                Textarea::make('notes')
                    ->label('Catatan Editor')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
