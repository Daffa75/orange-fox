<?php

namespace App\Filament\Resources\PerikananOfferingResource\Pages;

use App\Filament\Resources\PerikananOfferingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPerikananOffering extends ViewRecord
{
    protected static string $resource = PerikananOfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
