<?php

namespace App\Filament\Resources\PerikananOfferingResource\Pages;

use App\Filament\Resources\PerikananOfferingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerikananOffering extends EditRecord
{
    protected static string $resource = PerikananOfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
