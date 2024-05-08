<?php

namespace App\Filament\Resources\PeternakanOfferingResource\Pages;

use App\Filament\Resources\PeternakanOfferingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeternakanOffering extends EditRecord
{
    protected static string $resource = PeternakanOfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
