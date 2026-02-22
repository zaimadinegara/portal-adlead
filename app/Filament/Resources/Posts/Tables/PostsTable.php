<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan foto utama artikel
                ImageColumn::make('image')
                    ->label('Foto'),

                // Judul artikel dengan fitur pencarian dan pengurutan
                TextColumn::make('title')
                    ->label('Judul Artikel')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                // Menampilkan status tayang (Centang hijau jika true, silang merah jika false)
                IconColumn::make('is_published')
                    ->label('Tayang')
                    ->boolean()
                    ->sortable(),

                // Menampilkan waktu pembuatan artikel
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                // Di sini kamu bisa menambah filter berdasarkan status atau kategori nantinya
            ])
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