<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\ImageColumn;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationGroup = 'Partner';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Group::make()->schema([
                    Section::make('Partner Details')->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->numeric()
                            ->default(null),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required()
                            ->maxLength(255),

                    ])->columns(2),
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make('Role and Category')->schema([
                        Select::make('role')
                            ->relationship('roles', 'name')
                            ->preload()
                            ->required()
                            ->live(),
                        Select::make('contract_id')
                            ->relationship('contract', 'contract_name')
                            ->preload()
                            ->live(),
                    ])->columnSpan(1),
                    Section::make('Available Categories')->schema([
                        CheckboxList::make('category_id')
                            ->relationship('categories', 'category_name')
                            ->required()
                            ->columns(2),
                    ])->columnSpan(1),
                ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                    ImageColumn::make('avatar_url')
                    ->circular(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                /*Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),*/
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('Product_count')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contract.contract_name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('state')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('State')
                    ->label(fn (User $user) => $user->state ? 'Deactivate' : 'Activate')
                    ->action(function (User $user) {
                        $user->state = !$user->state;

                        $user->save();
                    })
                    ->icon(fn (User $user) => $user->state ? 'heroicon-m-check-badge' : 'heroicon-m-x-circle'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
