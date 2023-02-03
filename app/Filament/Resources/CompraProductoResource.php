<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompraProductoResource\Pages;
use App\Filament\Resources\CompraProductoResource\RelationManagers;
use App\Models\CompraProducto;
use App\Traits\useBaseMethods;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompraProductoResource extends Resource
{
    use useBaseMethods;
    protected static ?string $model = CompraProducto::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Card::make()
                ->schema([
                Forms\Components\Select::make('compra_id')
                    ->relationship('compra', 'id')
                    ->required()
                    ->placeholder('Seleccione una compra'),
                Forms\Components\Select::make('producto_id')
                    ->relationship('producto', 'nombre')
                    ->required()
                    ->placeholder('Seleccione un producto'),
                Forms\Components\TextInput::make('cantidad')
                    ->required()
                    ->placeholder('Cantidad de productos'),
                Forms\Components\TextInput::make('precio')
                    ->required()
                    ->placeholder('Precio de compra'),
                Forms\Components\TextInput::make('costo')
                    ->required()
                    ->placeholder('Costo de compra'),
                Forms\Components\TextInput::make('total')
                    ->required()
                    ->placeholder('Total de compra'),
            ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('compra_id')
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
            'index' => Pages\ListCompraProductos::route('/'),
            'create' => Pages\CreateCompraProducto::route('/create'),
            'view' => Pages\ViewCompraProducto::route('/{record}'),
            'edit' => Pages\EditCompraProducto::route('/{record}/edit'),
        ];
    }
}
