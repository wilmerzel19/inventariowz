<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompraResource\Pages;
use App\Filament\Resources\CompraResource\RelationManagers;
use App\Models\Compra;
use App\Traits\useBaseMethods;
use Filament\Forms\Components\Card;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompraResource extends Resource
{
    use useBaseMethods;
    protected static ?string $model = Compra::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                Forms\Components\DatePicker::make('fecha')
                    ->required()
                    ->autofocus()
                    ->placeholder('Fecha de la compra'),
                Forms\Components\TextInput::make('monto')
                    ->required()
                    ->placeholder('Monto de la compra'),
                Forms\Components\BelongsToSelect::make('proveedor_id')
                    ->relationship('proveedor', 'nombre')
                    ->required()
                    ->placeholder('Seleccione un proveedor'),
            ])->columns(2)
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('monto')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('proveedor.nombre')
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
            'index' => Pages\ListCompras::route('/'),
            'create' => Pages\CreateCompra::route('/create'),
            'view' => Pages\ViewCompra::route('/{record}'),
            'edit' => Pages\EditCompra::route('/{record}/edit'),
        ];
    }
}
