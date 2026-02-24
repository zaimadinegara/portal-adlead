<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
// Kita kembalikan alamat komponen ke namespace Forms yang benar
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Baris pertama: Judul dan Slug
                TextInput::make('title')
                    ->label('Judul Artikel')
                    ->placeholder('Ketik judul yang menarik...')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => 
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),

                TextInput::make('slug')
                    ->label('URL Slug')
                    ->placeholder('otomatis-terisi-setelah-mengetik-judul')
                    ->required()
                    ->unique('posts', 'slug', ignoreRecord: true)
                    ->maxLength(255),

                // Baris kedua: Editor Konten (Lebar Penuh)
                RichEditor::make('content')
                    ->label('Isi Artikel')
                    ->required()
                    ->columnSpanFull(),

                // Baris ketiga: Upload Gambar & Status
                FileUpload::make('image')
                    ->label('Gambar Utama')
                    ->image()
                    ->directory('post-images')
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Terbitkan Sekarang?')
                    ->default(false),
            ]);
    }
}