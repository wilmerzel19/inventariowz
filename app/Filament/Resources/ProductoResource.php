<?php

namespace App\Filament\Resources;
use App\Traits\useBaseMethods;
use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms\Components\Card;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductoResource extends Resource
{
    use useBaseMethods;
    protected static ?string $model = Producto::class;
    protected static ?string $navigationGroup = 'proveedores'; //grupo en el menu

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
           ->schema([
              Card::make()
              ->schema([

                Forms\Components\TextInput::make('nombre')
                ->label('nombre')
                ->required(),
                Forms\Components\TextInput::make('presentacion')
                ->label('presentacion')
                ->required(),
                Forms\Components\Toggle::make('disponibles')
                ->label('disponibles')

            ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('presentacion')
                ->sortable()
                ->searchable(),
                Tables\Columns\ToggleColumn::make('disponibles')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'view' => Pages\ViewProducto::route('/{record}'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
