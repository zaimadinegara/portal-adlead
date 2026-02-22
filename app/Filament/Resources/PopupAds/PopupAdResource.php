<?php

namespace App\Filament\Resources\PopupAds;

use App\Filament\Resources\PopupAds\Pages\CreatePopupAd;
use App\Filament\Resources\PopupAds\Pages\EditPopupAd;
use App\Filament\Resources\PopupAds\Pages\ListPopupAds;
use App\Filament\Resources\PopupAds\Schemas\PopupAdForm;
use App\Filament\Resources\PopupAds\Tables\PopupAdsTable;
use App\Models\PopupAd;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PopupAdResource extends Resource
{
    protected static ?string $model = PopupAd::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $navigationLabel = 'Popup Iklan';

    protected static ?string $pluralModelLabel = 'Popup Iklan';

    public static function form(Schema $schema): Schema
    {
        return PopupAdForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PopupAdsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPopupAds::route('/'),
            'create' => CreatePopupAd::route('/create'),
            'edit' => EditPopupAd::route('/{record}/edit'),
        ];
    }
}
