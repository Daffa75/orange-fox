<?php

namespace App\Filament\Resources\PeternakanPostResource\Pages;

use App\Filament\Resources\PeternakanPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeternakanPosts extends ListRecords
{
    protected static string $resource = PeternakanPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
