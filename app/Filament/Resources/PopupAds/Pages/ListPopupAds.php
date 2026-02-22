<?php

namespace App\Filament\Resources\PopupAds\Pages;

use App\Filament\Resources\PopupAds\PopupAdResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPopupAds extends ListRecords
{
    protected static string $resource = PopupAdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
