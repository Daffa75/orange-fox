<?php

namespace App\Filament\Resources\PeternakanOfferingResource\Pages;

use App\Filament\Resources\PeternakanOfferingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPeternakanOffering extends ViewRecord
{
    protected static string $resource = PeternakanOfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
