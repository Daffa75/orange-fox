<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeternakanOfferingResource\Api\Transformers\PeternakanOfferingTransformer;
use App\Filament\Resources\PeternakanOfferingResource\Pages;
use App\Models\PeternakanOffering;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PeternakanOfferingResource extends Resource
{
    protected static ?string $model = PeternakanOffering::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?int $navigationSort = 2;
    public static function getNavigationGroup(): ?string
    {
        return (__('Peternakan'));
    }

    public static function getPluralLabel(): ?string
    {
        return __('Peternakan Offerings');
    }

    public static function getApiTransformer()
    {
        return PeternakanOfferingTransformer::class;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->translateLabel()
                                    ->required()
                                    ->live(onBlur: true)
                                    ->maxLength(255)
                                    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(PeternakanOffering::class, 'slug', ignoreRecord: true),

                                Forms\Components\MarkdownEditor::make('description')
                                    ->disableToolbarButtons(
                                        ['attachFiles']
                                    )
                                    ->columnSpan('full'),
                            ])
                            ->columns(2),

                        Forms\Components\Section::make(__('Image'))
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->image()
                                    ->imageEditor()
                                    ->imageResizeMode('contain')
                                    ->imageCropAspectRatio('16:9')
                                    ->multiple()
                                    ->reorderable()
                                    ->collection('offering/images')
                                    ->hiddenLabel()
                            ])
                            ->collapsible(),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Option')
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->translateLabel()
                                    ->numeric()
                                    ->prefix('Rp')
                                    ->required(),

                                Forms\Components\TextInput::make('qty')
                                    ->numeric()
                                    ->label(__('Product Stock'))
                                    ->required(),


                                Forms\Components\TextInput::make('contact')
                                    ->label('Nomor Whatsapp')
                                    ->placeholder('8213456789')
                                    ->tel()
                                    ->telRegex('/^(8[1-9][0-9]{7,12})$/')
                                    ->prefix(('+62')),


                                Forms\Components\Toggle::make('is_visible')
                                    ->default(true)
                                    ->label(__('Show Product')),
                            ])
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->wrap()
                    ->lineclamp(2)
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->translateLabel()
                    ->money('IDR', locale: 'id')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('qty')
                    ->label("Stock")
                    ->translateLabel()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Is Visible')
                    ->translateLabel()
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->translateLabel()
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeternakanOfferings::route('/'),
            'create' => Pages\CreatePeternakanOffering::route('/create'),
            'view' => Pages\ViewPeternakanOffering::route('/{record}'),
            'edit' => Pages\EditPeternakanOffering::route('/{record}/edit'),
        ];
    }
}
