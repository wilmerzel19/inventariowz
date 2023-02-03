<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoVentaResource\Pages;
use App\Filament\Resources\ProductoVentaResource\RelationManagers;
use App\Models\ProductoVenta;
use App\Traits\useBaseMethods;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductoVentaResource extends Resource
{
    use useBaseMethods;
    protected static ?string $model = ProductoVenta::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Card::make()
                ->schema([
                Forms\Components\Select::make('venta_id')
                    ->required()
                    ->autofocus()
                    ->placeholder('Venta'),
                Forms\Components\Select::make('producto_id')
                    ->required()
                    ->autofocus()
                    ->placeholder('Producto'),
                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->autofocus()
                    ->placeholder('Cantidad'),
                Forms\Components\TextInput::make('precio')
                    ->placeholder('Precio'),
                Forms\Components\TextInput::make('costo')
                    ->placeholder('Costo'),
                Forms\Components\TextInput::make('total')
                    ->placeholder('Total'),

            ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('venta_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('producto_id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('cantidad')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('precio')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('costo')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
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
            'index' => Pages\ListProductoVentas::route('/'),
            'create' => Pages\CreateProductoVenta::route('/create'),
            'view' => Pages\ViewProductoVenta::route('/{record}'),
            'edit' => Pages\EditProductoVenta::route('/{record}/edit'),
        ];
    }
}
