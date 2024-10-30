<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VirtualResource\Pages;
use App\Filament\Resources\VirtualResource\RelationManagers;
use App\Models\Virtual;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VirtualResource extends Resource
{
    protected static ?string $model = Virtual::class;
    protected static ?string $navigationGroup = 'Services';
    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        Forms\Components\TextInput::make('virtual_name')
                            ->required(),
                        Forms\Components\TextInput::make('url')
                            ->required(),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('S/.'),
                    ])
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make()->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required()
                            ->imageEditor(),
                        Forms\Components\Textarea::make('short_Description')
                            ->required()
                            ->columnSpanFull(),
                    ])
                ])->columnSpan(1),
                Group::make()->schema([
                    Section::make()->schema([
                        RichEditor::make('long_Description')
                            ->hint('Translatable')
                            ->hintIcon('heroicon-m-language')
                            ->required(),
                    ])
                ])->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('virtual_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('view')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('state')
                    ->boolean(),
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
                Tables\Actions\Action::make('State')
                    ->label(fn (Virtual $virtual) => $virtual->state ? 'Deactivate' : 'Activate')
                    ->action(function (Virtual $virtual) {
                        $virtual->state = !$virtual->state;

                        $virtual->save();
                    })
                    ->icon(fn (Virtual $virtual) => $virtual->state ? 'heroicon-m-check-badge' : 'heroicon-m-x-circle'),
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
            'index' => Pages\ListVirtuals::route('/'),
            'create' => Pages\CreateVirtual::route('/create'),
            'view' => Pages\ViewVirtual::route('/{record}'),
            'edit' => Pages\EditVirtual::route('/{record}/edit'),
        ];
    }
}
