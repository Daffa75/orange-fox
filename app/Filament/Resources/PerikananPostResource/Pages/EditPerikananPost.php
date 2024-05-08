<?php

namespace App\Filament\Resources\PerikananPostResource\Pages;

use App\Filament\Resources\PerikananPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerikananPost extends EditRecord
{
    protected static string $resource = PerikananPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
