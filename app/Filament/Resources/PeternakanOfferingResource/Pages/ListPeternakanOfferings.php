<?php

namespace App\Filament\Resources\PeternakanOfferingResource\Pages;

use App\Filament\Resources\PeternakanOfferingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeternakanOfferings extends ListRecords
{
    protected static string $resource = PeternakanOfferingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
