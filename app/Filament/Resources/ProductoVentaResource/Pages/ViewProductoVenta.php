<?php

namespace App\Filament\Resources\ProductoVentaResource\Pages;

use App\Filament\Resources\ProductoVentaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProductoVenta extends ViewRecord
{
    protected static string $resource = ProductoVentaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
