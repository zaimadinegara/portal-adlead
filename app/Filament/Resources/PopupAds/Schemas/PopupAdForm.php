<?php

namespace App\Filament\Resources\PopupAds\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PopupAdForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Iklan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('image')
                    ->label('URL Gambar / Path Storage')
                    ->maxLength(255)
                    ->placeholder('https://... atau popup-images/banner.jpg')
                    ->columnSpanFull(),

                TextInput::make('external_url')
                    ->label('Link Tujuan')
                    ->url()
                    ->maxLength(255)
                    ->columnSpanFull(),

                TextInput::make('button_label')
                    ->label('Teks Tombol')
                    ->maxLength(60)
                    ->default('Lihat Sekarang'),

                TextInput::make('delay_seconds')
                    ->label('Delay Muncul (detik)')
                    ->numeric()
                    ->default(2)
                    ->minValue(0),

                TextInput::make('priority')
                    ->label('Prioritas (angka kecil lebih dulu)')
                    ->numeric()
                    ->default(1)
                    ->minValue(1),

                DateTimePicker::make('starts_at')
                    ->label('Mulai Tayang'),

                DateTimePicker::make('ends_at')
                    ->label('Selesai Tayang'),

                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
