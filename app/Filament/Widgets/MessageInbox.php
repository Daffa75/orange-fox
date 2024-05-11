<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\InboxResource;
use App\Models\Inbox;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MessageInbox extends BaseWidget
{
    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }
    public function table(Table $table): Table
    {
        return $table
            ->query(
                InboxResource::getEloquentQuery()
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable(),
                Tables\Columns\TextColumn::make('message')
                    ->sortable()
                    ->wrap()
                    ->lineClamp(2),
                Tables\Columns\TextColumn::make('source')
                    ->sortable()
                    ->wrap()
                    ->lineClamp(2),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ]);
    }
}
