<?php

namespace App\Filament\Resources\PerikananPostResource\Pages;

use App\Filament\Resources\PerikananPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPerikananPosts extends ListRecords
{
    protected static string $resource = PerikananPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
