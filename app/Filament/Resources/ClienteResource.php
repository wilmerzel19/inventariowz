<?php

namespace App\Filament\Resources;
use  App\Traits\useBaseMethods;
use App\Filament\Resources\ClienteResource\Pages;
use App\Filament\Resources\ClienteResource\RelationManagers;
use App\Models\Cliente;
use Filament\Forms\Components\Card;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClienteResource extends Resource
{
   use useBaseMethods;
    protected static ?string $model = Cliente::class;
    protected static ?string $activeNavigationIcon = 'heroicon-s-document-text';

protected static ?string $navigationLabel = 'Clientes';
protected static ?string $navigationGroup = 'Settings'; //grupo en el menu


    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
    ->schema([

              static::nameField(),
                Forms\Components\TextInput::make('cedula')
                    ->label('cedula')
                    ->required(),
                Forms\Components\Select::make('sexo')
                    ->label('sexo')
                    ->placeholder('Seleccionar sexo')
                    ->options([
                        'masculino' => 'masculino',
                        'femenino' => 'femenino',

                    ])
                    ->required(),
                Forms\Components\TextInput::make('telefono')
                    ->label('telefono')
                    ->required(),

                Forms\Components\TextInput::make('direccion')
                    ->label('direccion')
                    ->required(),
            ])->columns(2)


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('cedula')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('sexo')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('telefono')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
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
            'index' => Pages\ListClientes::route('/'),
            'create' => Pages\CreateCliente::route('/create'),
            'view' => Pages\ViewCliente::route('/{record}'),
            'edit' => Pages\EditCliente::route('/{record}/edit'),
        ];
    }
}
