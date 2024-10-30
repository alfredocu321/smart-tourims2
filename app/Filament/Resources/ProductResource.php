<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Filament\Resources\hasRole;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use App\Models\Detail;
use Awcodes\Curator\Components\Forms\CuratorPicker;

use function Laravel\Prompts\text;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationGroup = 'Services';
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';


    public static function form(Form $form): Form
    {
        $loggedInUser = auth()->user();
        $categories = $loggedInUser->categories->pluck('category_name');
        return $form
            ->schema([
                Group::make()->schema([
                    Hidden::make('user_id')
                    ->default(Auth::id()),
                    Section::make()->schema([
                        Forms\Components\TextInput::make('product_name')
                            ->required(),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('S/.'),
                        Select::make('category_id')
                            ->relationship('category', 'category_name')
                            ->options($categories)
                            ->preload()
                            
                            ->required(),
                    ])
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make()->schema([
                        CuratorPicker::make('image')
                        ->outlined(true)
                        ->size('sm')
                        ->required()
                        ->orderColumn('order'),
                        
                        Forms\Components\Textarea::make('short_Description')
                            ->required()
                            ->columnSpanFull(),
                        Hidden::make('user_id')
                            ->default(Auth::id()),
                    ])
                ])->columnSpan(1),

                Group::make()->schema([
                    Section::make()->schema([
                        RichEditor::make('long_Description')
                            ->hint('Translatable')
                            ->hintIcon('heroicon-m-language')
                            ->required()
                            ->columnSpanFull(),
                    ])
                ])->columnSpanFull(),
                Group::make()->schema([
                    Section::make()->schema([

                        Repeater::make('details')
                            ->relationship('details')
                            ->schema([
                                Forms\Components\TextInput::make('detail_name')
                                    ->required(),
                                    CuratorPicker::make('image')
                                    ->required(),
                                RichEditor::make('description')
                                ->required(),
                            ])
                            ->minItems(0)
                            ->maxItems(10)
                    ])

                ])->columnSpanFull(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('media.path'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('category.category_name'),
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
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('State')
                    ->label(fn (Product $product) => $product->state ? 'Deactivate' : 'Activate')
                    ->action(function (Product $product) {
                        $product->state = !$product->state;
                        $product->save();
                    })
                    ->icon(fn (Product $product) => $product->state ? 'heroicon-m-check-badge' : 'heroicon-m-x-circle'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes())
            ->query(
                $table->getQuery()
                    ->when(!hasRole(auth()->user(), 'Admin') && !Gate::allows('view-any-product'), function (Builder $query) {
                        return $query->where('user_id', auth()->id());
                    })
            );
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    
}
