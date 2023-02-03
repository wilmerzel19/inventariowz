<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProveedorResource\Pages;
use App\Filament\Resources\ProveedorResource\RelationManagers;
use App\Models\Proveedor;
use App\Traits\useBaseMethods;
use Filament\Forms\Components\Card;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProveedorResource extends Resource
{
    use useBaseMethods;
    protected static ?string $model = Proveedor::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    //grupo en el menu
    protected static ?string $navigationGroup = 'proveedores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([

                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->autofocus()
                    ->placeholder('Nombre del proveedor'),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->placeholder('Dirección del proveedor'),
                Forms\Components\TextInput::make('telefono')
                    ->required()
                    ->placeholder('Teléfono del proveedor'),

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

                Tables\Columns\TextColumn::make('direccion')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
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
            'index' => Pages\ListProveedors::route('/'),
            'create' => Pages\CreateProveedor::route('/create'),
            'view' => Pages\ViewProveedor::route('/{record}'),
            'edit' => Pages\EditProveedor::route('/{record}/edit'),
        ];
    }
}
