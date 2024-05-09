<?php

namespace App\Filament\Resources\InboxResource\Pages;

use App\Filament\Resources\InboxResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageInboxes extends ManageRecords
{
    protected static string $resource = InboxResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
