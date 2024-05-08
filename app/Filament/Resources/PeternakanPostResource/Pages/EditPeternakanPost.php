<?php

namespace App\Filament\Resources\PeternakanPostResource\Pages;

use App\Filament\Resources\PeternakanPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeternakanPost extends EditRecord
{
    protected static string $resource = PeternakanPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
