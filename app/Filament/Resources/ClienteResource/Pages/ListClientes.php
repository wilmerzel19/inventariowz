<?php

namespace App\Filament\Resources\ClienteResource\Pages;

use App\Filament\Resources\ClienteResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientes extends ListRecords
{
    protected static string $resource = ClienteResource::class;
    protected static ?string $title = 'Lista de Clientes';//titulo de la pagina

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
