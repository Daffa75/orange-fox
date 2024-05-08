<?php

namespace App\Filament\Resources\PeternakanPostResource\Pages;

use App\Filament\Resources\PeternakanPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPeternakanPost extends ViewRecord
{
    protected static string $resource = PeternakanPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
