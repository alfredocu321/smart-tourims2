<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoResource\Pages;
use App\Filament\Resources\PhotoResource\RelationManagers;
use App\Models\Photo;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotoResource extends Resource
{
    protected static ?string $model = Photo::class;
    protected static ?string $navigationGroup = 'Services';
    protected static ?string $navigationIcon = 'heroicon-s-photo';
    protected static ?string $navigationLabel = 'Photo 360°';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        CuratorPicker::make('image')
                        ->outlined(true)
                        ->size('sm')
                        ->required()
                        ->orderColumn('order'),
                        Forms\Components\TextInput::make('photo_name')
                            ->required(),
                    ])
                ]),

                Group::make()->schema([
                    Section::make()->schema([
                        Repeater::make('images')
                            ->relationship('image')
                            ->schema([
                                CuratorPicker::make('image')
                        ->outlined(true)
                        ->size('sm')
                        ->required()
                        ->orderColumn('order'),
                                Forms\Components\TextInput::make('image_name')
                                    ->maxLength(255),
                            ])
                            ->minItems(0)
                            ->maxItems(10)
                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('photo_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('image_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            'index' => Pages\ListPhotos::route('/'),
            'create' => Pages\CreatePhoto::route('/create'),
            'view' => Pages\ViewPhoto::route('/{record}'),
            'edit' => Pages\EditPhoto::route('/{record}/edit'),
        ];
    }
}
