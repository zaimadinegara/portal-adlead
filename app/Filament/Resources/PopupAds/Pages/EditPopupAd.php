<?php

namespace App\Filament\Resources\PopupAds\Pages;

use App\Filament\Resources\PopupAds\PopupAdResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPopupAd extends EditRecord
{
    protected static string $resource = PopupAdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
