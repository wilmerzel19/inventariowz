<?php


namespace App\Traits;

use Filament\Forms;
use Filament\Tables;
use Filament\Select;







//use Filament\Resource




trait useBaseMethods{

    /**
     *
     * campo para crear nombres en la tablas en la base de datos
     *  */


    public static function nameField(){
        return Forms\Components\TextInput::make('name')
        ->required()
        ->autofocus()
        ->placeholder('name')
        ->maxLength(191);


            }
            //is active field
            public static function isActiveField(){
                return Forms\Components\Toggle::make('active')
                ->label('Active')
                ->inline(0);
            }
              //name column
              public static function nameColumn($name='name', $label='country'){
                return Tables\Columns\TextColumn::make($name)
                ->sortable()
                ->searchable()
                ->label($label);
            }
            public static function isActiveColumn(){
                return Tables\Columns\ToggleColumn::make('active')
                ->label('Active');

            }
            public static function taskColumn(){
                return[
                    Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),

                ];
        }
        //traer los clientes
        public static function clienteField(){
        return Forms\Components\Select::make('cliente_id')
        ->label('cliente_id')
        ->searchable()
        ->required()
        ->placeholder('cliente_id')
        ->options(function () {
           return \App\Models\Cliente::all()->mapWithKeys(function ($item) {
                return [$item->id => $item->name];
            });


        });



        }
         protected static function getNavigationBadge(): ?string //badge
    {
        return static::getModel()::count();
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() < 1 ? 'danger' : 'primary';
    }

    protected static function getActiveNavigationIcon(): string
    {
        return 'heroicon-s-arrow-circle-right';
    }
        }















