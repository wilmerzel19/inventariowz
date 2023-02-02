<?php

namespace App\Filament\Resources\CompraProductoResource\Pages;

use App\Filament\Resources\CompraProductoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompraProductos extends ListRecords
{
    protected static string $resource = CompraProductoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
