<?php

namespace App\Filament\Resources\PerikananPostResource\Pages;

use App\Filament\Resources\PerikananPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPerikananPost extends ViewRecord
{
    protected static string $resource = PerikananPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
