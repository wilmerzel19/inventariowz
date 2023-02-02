<?php

namespace App\Filament\Resources\ProductoVentaResource\Pages;

use App\Filament\Resources\ProductoVentaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductoVentas extends ListRecords
{
    protected static string $resource = ProductoVentaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
