<?php

namespace App\Filament\Resources\CompraProductoResource\Pages;

use App\Filament\Resources\CompraProductoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCompraProducto extends ViewRecord
{
    protected static string $resource = CompraProductoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
